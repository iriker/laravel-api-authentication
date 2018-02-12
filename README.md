### Configuration
This package will automatically setup JWT for your Laravel application, including service providers and configuration files - you will however have access to the configuration file in case you need to modify it, located at `config/jwt.php`

### Usage
This package uses the User model by default, you can change this in the configuration file to suit your needs if you like.

To retrieve a JWT you'll need to hit the `POST /api/login` endpoint with `appication/json` data of your __email__ and __password__ as below:

 ```JSON
 {
 	"email": "email@pvtl.io",
 	"password": "password"
 }
 ```
 
 #### Middleware
 There currently isn't a way to __magically__ load Middleware into a Laravel application via composer (like Service Providers and Facades) so you'll need to [do this step manually](https://github.com/tymondesigns/jwt-auth/wiki/Authentication#laravel-5-1) to take advantage of protecting routes with JWT
 
 If you're unfamiliar with JWT, I recommend reading up [here](https://jwt.io/introduction/).
 