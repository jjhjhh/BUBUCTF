FROM python:3.10-slim

RUN apt-get update \
    && apt-get install -y python3 build-essential \
    --no-install-recommends \
    && pip install flask flask-jwt-extended \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY app.py .
COPY templates ./templates
COPY static ./static
COPY flag.txt .

CMD ["python", "app.py"]