from flask import Flask, make_response,render_template, request
import jwt
import os

app = Flask(__name__)

# 시크릿 키
SECRET_KEY = 'PP_HACK_CAMP'
try:
    FLAG = open('./flag.txt', 'r').read()
except:
    FLAG = '[**FLAG**]'

@app.route('/')
def index():

    jwt_token = request.cookies.get('What_is_this?')

    # JWT 토큰 생성 + 쿠키 설정
    if not jwt_token:
        
        jwt_token = jwt.encode({'sub': 'guest'}, SECRET_KEY, algorithm='HS256')

        response = make_response(render_template('index.html',data="I LOVE JSON"))
        response.set_cookie('What_is_this?', jwt_token)
        return response
    
    #jwt sub 검사
    try:
        payload = jwt.decode(jwt_token, SECRET_KEY, algorithms=['HS256'])

        if payload.get('sub') == "admin" and FLAG:
            return render_template('index.html', data="<span>"+FLAG+"</span>")
        else:
            return render_template('index.html', data="I LOVE JSON")
    except:
        return render_template('index.html', data="I LOVE JSON")

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
