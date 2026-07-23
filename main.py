import json
import os
import docx
import pdfplumber
from fastapi import FastAPI, File, Form, HTTPException, UploadFile
from fastapi.middleware.cors import CORSMiddleware
from openai import OpenAI

app = FastAPI()

# Enable CORS so your frontend can communicate with this backend
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],  # Adjust in production
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# Initialize Groq client (uses OpenAI-compatible SDK)
# Pass your API key directly or set GROQ_API_KEY environment variable
GROQ_API_KEY = os.getenv("GROQ_API_KEY", "YOUR_GROQ_API_KEY_HERE")
groq_client = OpenAI(
    base_url="https://api.groq.com/openai/v1",
    api_key=GROQ_API_KEY,
)


def extract_text_from_file(file: UploadFile) -> str:
    """Extracts raw text from PDF or DOCX files."""
    filename = file.filename.lower()
    text = ""

    try:
        if filename.endswith(".pdf"):
            with pdfplumber.open(file.file) as pdf:
                for page in pdf.pages:
                    extracted = page.extract_text()
                    if extracted:
                        text += extracted + "\n"
        elif filename.endswith(".docx"):
            doc = docx.Document(file.file)
            text = "\n".join([p.text for p in doc.paragraphs if p.text])
        else:
            raise HTTPException(
                status_code=400, detail="Only PDF and DOCX files are supported."
            )
    except Exception as e:
        raise HTTPException(
            status_code=500, detail=f"Error reading document: {str(e)}"
        )

    return text.strip()


@app.post("/analyze")
async def analyze_resume(
    file: UploadFile = File(...), job_description: str = Form("")
):
    # 1. Extract text from uploaded document
    resume_text = extract_text_from_file(file)

    if not resume_text:
        raise HTTPException(
            status_code=400, detail="Could not extract text from document."
        )

    # 2. Construct Prompt
    system_prompt = """
    You are an expert ATS (Applicant Tracking System) resume analyzer. 
    Evaluate the provided resume against the job description (if provided).
    You MUST respond ONLY with a valid raw JSON object matching this structure:
    {
        "ats_score": <number between 0 and 100>,
        "summary": "<2-sentence executive summary>",
        "matching_skills": ["<skill1>", "<skill2>"],
        "missing_skills": ["<skill1>", "<skill2>"],
        "improvements": ["<actionable advice 1>", "<actionable advice 2>"]
    }
    """

    user_prompt = f"""
    Resume Content:
    {resume_text}

    Target Job Description:
    {job_description if job_description else "General Software/Tech Role Evaluation"}
    """

    # 3. Request LLM Analysis
    try:
        response = groq_client.chat.completions.create(
            model="llama-3.3-70b-versatile",  # High capability free model
            messages=[
                {"role": "system", "content": system_prompt},
                {"role": "user", "content": user_prompt},
            ],
            temperature=0.2,
            response_format={"type": "json_object"},
        )

        analysis = json.loads(response.choices[0].message.content)
        return {"success": True, "data": analysis}

    except Exception as e:
        raise HTTPException(
            status_code=500, detail=f"AI Analysis failed: {str(e)}"
        )


if __name__ == "__main__":
    import uvicorn

    uvicorn.run(app, host="0.0.0.0", port=8000)