# AI Utilities Pro

## Overview
A premium collection of AI‑powered and utility tools built with PHP, vanilla CSS/JS, and Docker. Features include:
- Password Generator
- AI Summarizer (mock implementation)
- SEO Meta Tag Generator
- **AI Image Generator** (mock image generation)
- Dark‑mode toggle
- Google Analytics 4 integration
- Placeholder ad slots (ready for AdSense)

## Quick Start (Local Development)
```bash
# Clone the repo
git clone https://github.com/218128/ai-utilities-pro.git
cd ai-utilities-pro

# Build and run the Docker container
docker build -t ai-utilities-pro .
docker run -p 80:80 ai-utilities-pro
```
Open `http://localhost` in your browser.

## Deployment to Render.com
1. Push the repository to GitHub (already done).
2. In Render, create a **Web Service**:
   - Repository: your GitHub repo
   - Build Command: `docker build -t ai-utilities-pro .`
   - Start Command: `docker run -p 80:80 ai-utilities-pro`
   - Enable **Free TLS** (HTTPS) in the service settings.
3. Render will automatically rebuild on each push.

## Adding Real AI Image Generation
Replace the mock `mockGenerateImage` method in `src/Controllers/ImageGeneratorController.php` with a call to an AI image API (e.g., OpenAI DALL·E or Gemini). Update the API key in an `.env` file and ensure the container has the key available.

## AdSense Integration
Paste your AdSense script into the `<div class="ad-slot ...">` elements in `templates/layout.php`.

## CI / Linting
A GitHub Actions workflow (`.github/workflows/ci.yml`) runs PHP lint and builds the Docker image on every push.

## License
MIT – feel free to fork and extend!
