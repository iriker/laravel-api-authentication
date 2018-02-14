### Configuration
This package will automatically setup JWT for your Laravel application, including service providers/middleware and configuration files - configuration file will be located at `config/jwt.php` once installed.

### Usage
This package uses the User model by default, you can change this in the configuration file to suit your needs if you like.

To retrieve a JWT you'll need to hit the `POST /api/login` endpoint with `appication/json` data of your __email__ and __password__ as below:

 ```JSON
 {
 	"email": "email@pvtl.io",
 	"password": "password"
 }
 ```
 
 You can also register a new user account against `POST /api/register` with the following `application/json` data:
 
  ```JSON
  {
  	"name": "John Smith",
  	"email": "email@pvtl.io",
  	"password": "password"
  }
  ```
   
 If you're unfamiliar with JWT, I recommend reading up [here](https://jwt.io/introduction/).
 
 If you're still unsure on how this implementation works or how you can implement it into your application, check out the `tests` folder and see how everything is put together.