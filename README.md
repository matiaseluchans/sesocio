
### Se Socio test

### Rutas de Api Login

Route::post('apiregister', 'Auth\RegisterController@apiregister');<br>
Route::post('apilogin', 'Auth\LoginController@apilogin');<br>
Route::get('apiuser', 'Auth\LoginController@apiuser');<br>
Route::get('apilogout', 'Auth\LoginController@apilogout');<br>

### Body Raw para register

{
	"name" : "matias",
	"email" : "xxxxxxx@gmail.com",
	"password": "password"
}



### Ruta de api usuarios, roles
Route::apiResource('/users', 'Api\UserController');<br>
Route::get('/listusers/{role}', 'Api\UserController@listUsersRole');<br>

### Ruta con componente vue
/users

### Extra
Password de usuarios generados : password