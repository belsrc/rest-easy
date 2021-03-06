[![No Maintenance Intended](https://img.shields.io/badge/No%20Maintenance%20Intended-x-red.svg?style=flat-square&longCache=true)](http://unmaintained.tech/)

# RestEasy
A simple library to make restful curl requests.

### Install
You can install it by downloading the [zip](https://github.com/belsrc/rest-easy/archive/master.zip) and including it in your project or, preferably, using Composer.
```
{
    "require": {
        "belsrc/rest-easy": "dev-master"
    }
}
```
If you are using Laravel you can also include the ServiceProvider in the ```app/config/app.php``` 'providers' array.
```
    'Belsrc\RestEasy\RestEasyServiceProvider'
```
as well as the Facade in the 'aliases' array.
```
    'RestEasy' => 'Belsrc\RestEasy\Facades\RestEasy'
```

### Quick Example
```php
Route::get('/', function() {
    $headers = array(
        'Content-Type: text/html',
        'Accept: text/html',
        'Accept-Charset: utf-8',
        'Accept-Language: en-US'
    );
    $tmp = RestEasy::get( 'http://laravel.com/', $headers );
    echo $tmp->body;
});
```

#### RestEasy Methods
Just four easy methods to remember
```php
RestEasy::get($url, $headers)
RestEasy::post($url, $headers, $data)
RestEasy::put($url, $headers, $data)
RestEasy::delete($url, $headers)
```
with the response being an instance of the ```CurlResponse``` object having a few simple properties.
```php
CurlResponse::getBody()
CurlResponse::getInfo()
CurlResponse::getError()
```
all of which can also be called like normal properties.
```php
$response->body
$response->info
$response->error
```

## License ##
RestEasy is released under a BSD 3-Clause License

Copyright &copy; 2013-2014, Bryan Kizer
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are
met:

* Redistributions of source code must retain the above copyright notice,
  this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice,
  this list of conditions and the following disclaimer in the documentation
  and/or other materials provided with the distribution.
* Neither the name of the Organization nor the names of its contributors
  may be used to endorse or promote products derived from this software
  without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS
IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED
TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A
PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED
TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
