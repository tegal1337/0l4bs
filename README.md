
## 0l4bs

![Screenshoot](img/xl4bs.png)
<br>
Cross-site scripting labs for web application security enthusiasts

### List of Chall :
<pre>
~ Chall 1 | URL
~ Chall 2 | Form
~ Chall 3 | User-Agent
~ Chall 4 | Referrer
~ Chall 5 | Cookie
~ Chall 6 | LocalStorage
~ Chall 7 | Login Page
~ Chall 8 | File Upload
~ Chall 9 | Base64 Encoding
~ Chall 10 | Removes Alert
~ Chall 11 | Removes Script
~ Chall 12 | Preg_replace
~ Chall 13 | HTML Entities
~ Chall 14 | Regex Filter #1
~ Chall 15 | Regex Filter #2
~ Chall 16 | Regex Filter #3
~ Chall 17 | HTML Entities + URL Encode
~ Chall 18 | HTML Entities #2 (Special Character)
~ Chall 19 | HTML Entities #3 (Input Value)
~ Chall 20 | HTML Entities #4 (Input Value + Capitalizes)
</pre>

### Screenshot :
![Screenshoot](img/screenshoot-xl4bs.png)<br>
![Screenshoot](img/screenshoot-xl4bs-2.png)

### Instalation :
<ul>
  <li>Run your web server (XAMPP / LAMPP)</li>
  <li>Clone the repository and put the files in the /htdocs/xss-labs</li>
  <li>You can akses http://localhost:8080/xss-labs</li>
  <li>Happy Hacking ^_^</li>
</ul>

### Run this image

To run this image you need [docker](http://docker.com) installed. Just run the command:

    docker run --name web-ctf -d -it -p 80:80 hightechsec/xsslabs
### Deploy Manually Docker image

- Clone this repo (`git clone https://github.com/tegal1337/0l4bs`)
- Then run `docker build -t "xsslabs" .` and wait untill it's done 
- If the build is clear, run this command `docker run --name web-ctf -d -it -p 80:80 xsslabs`

### Write Up / Articles

0l4bs XSS Labs (https://tegalsec.org/0l4bs-cross-site-scripting-labs-for-web-application-security-enthusiasts/)<br>
跨站脚本攻击实验室：0l4bs (https://zhuanlan.zhihu.com/p/108023848)<br>
0l4bs XSS实验 (https://icssec.club/2020/02/25/0l4bs-XSS/)<br>
Kitploit (https://www.kitploit.com/2020/02/0l4bs-cross-site-scripting-labs-for-web.html?m=0)

### Support our organization by giving donations

[![Foo](https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif)](https://paypal.me/dalpan)
  
