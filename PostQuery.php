<?php
/*
eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImIzZDI5NmYxNjEzOWNjYWFhMDNkYTFlNWM4M2ZhMzJkNjQxOTU3ODExMzRiMDVhMzM5ZGJlYmFhM2YxYzBhMmE4ZjE0ZTE5ODM4YWQ2M2ExIn0.eyJhdWQiOiJlNGZhOWRkYi04NDJhLTRkYmYtYWY2OC1jM2YzOGU4MTI1MTMiLCJqdGkiOiJiM2QyOTZmMTYxMzljY2FhYTAzZGExZTVjODNmYTMyZDY0MTk1NzgxMTM0YjA1YTMzOWRiZWJhYTNmMWMwYTJhOGYxNGUxOTgzOGFkNjNhMSIsImlhdCI6MTYzMzc3MDY5OCwibmJmIjoxNjMzNzcwNjk4LCJleHAiOjE2MzM4NTcwOTgsInN1YiI6Ijc1MDY2ODIiLCJhY2NvdW50X2lkIjoyOTc0MDU4Miwic2NvcGVzIjpbInB1c2hfbm90aWZpY2F0aW9ucyIsImNybSIsIm5vdGlmaWNhdGlvbnMiXX0.fd1f5Q4WL2Nmq9PMHD0jG0v2ixsYsbJ0PsbF6nrL8g03Iend54sJJVMzWBaqe7Jykwwbm_0c8IxvL0YVRFS2XzavjpZ6cLt0ujEXTjM-hxYU-ZKz3p86DbhAa8UEuCbM7uU1vmNkJgh987HRFAm0CPg20zlv0DFPIhJ8cQDwWmQqT9mFNZH4UVMfkZOKxdRJL55tAbWRGuDwHuOlrNLzoHV5Pdnp1eZYzCnhQC5Ejp8k1NbAykcOlFnfOXnUMBxCjMxBheZavFvRRBIoX1kz9yhAIErIcBbRasVaegTWTp7uSzfrfk171joW_eposnzEFuaFIvcweoz2IZc5Z6S1jQ
*-Access-Token*/

$subdomain = '9178889867'; //Поддомен нужного аккаунта
$link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/complex'; //Формируем URL для запроса
$access_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImM2OGNkMTdlMTIyMzAyZmJjMDMxNTZmNWQwYjg3MDkwMzgyNjY2OWQyYTdmZDlmOGZhMmI2YzY2MzM1NWE2NjZjZjYxZjk1Yzg2ZDg2NjE4In0.eyJhdWQiOiJlNGZhOWRkYi04NDJhLTRkYmYtYWY2OC1jM2YzOGU4MTI1MTMiLCJqdGkiOiJjNjhjZDE3ZTEyMjMwMmZiYzAzMTU2ZjVkMGI4NzA5MDM4MjY2NjlkMmE3ZmQ5ZjhmYTJiNmM2NjMzNTVhNjY2Y2Y2MWY5NWM4NmQ4NjYxOCIsImlhdCI6MTYzNDMyMzExMSwibmJmIjoxNjM0MzIzMTExLCJleHAiOjE2MzQ0MDk1MTEsInN1YiI6Ijc1MDY2ODIiLCJhY2NvdW50X2lkIjoyOTc0MDU4Miwic2NvcGVzIjpbInB1c2hfbm90aWZpY2F0aW9ucyIsImNybSIsIm5vdGlmaWNhdGlvbnMiXX0.I2ODRj3iJ5YW5ZWNNKvZG5ac-2z5AXgoyaUSbKhBBpLN7kF9glJp5LvbsPPsvqLp-6tQfvYGYrLA-5qle53qo015x52Qg1-tWzKCGMMgpf_6Yoyd3urIOQ5t7O6WMCQ8l-jSmravMsT0SiKUusAIQ7hyrC8OQj6rsdMXKjP0zxHmMaH1k0hVhhaK81o3zBX3L8DyVM3Gs6jkeXoD9_Z0zpxzhPmcfzQ_EIzHrAd-DEXp15vXEMZV0hPQrc0aLinUUSRgfOHXonY9MLEoKOZ0qO-lVWLOV99Ur0FQs4x3KH0sQaD91ThIK9xxkqaIrm929iloSgQseUqmFdopcrh1og';
$headers = 
['Authorization: Bearer ' . $access_token,
 'Content-Type:application/json'];
/** Получаем данные из формы для сделки*/
//$data = array(
//['name'=> 'Название сделки','price' => 3422,'_embedded'=>['contacts'=>['first_name'=>'Владос','custom_fields_values'=>['field_id'=>464321,'values'=>['value'=>'89393306605']]]]]);

$name  = $_POST['name'];
$price = $_POST['price'];
$email = $_POST['email'];
$phone = $_POST['phone'];


$data = array(array (
  'name' => 'Название сделки',
  'price' => (int)$price,
  '_embedded' => 
  array (
    'contacts' => 
    array (
      array (
        'first_name' => $name,
        'created_at' => 1608905348,
        'custom_fields_values' => 
        array (
          array (
            'field_id' => 464323,
            'values' => 
            array (
              array (
                'enum_id' => 228121,
                'value' => $email 
              )
            ),
          ),
          array (
            'field_id' => 464321,
            'values' => 
            array (
             
              array (
                'enum_id' => 228109,
                'value' => (int)$phone
              ), 
            ),
          ),
        ),
      ),
    ),
  ),
));
				                                                          
$curl = curl_init(); //Сохраняем дескриптор сеанса cURL
/** Устанавливаем необходимые опции для сеанса cURL  */
curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
curl_setopt($curl,CURLOPT_URL, $link);
curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);
curl_setopt($curl,CURLOPT_HEADER, false);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data,JSON_UNESCAPED_UNICODE));
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
$out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
/** Теперь мы можем обработать ответ, полученный от сервера. Это пример. Вы можете обработать данные своим способом. */
$code = (int)$code;
$errors = [
	400 => 'Bad request',
	401 => 'Unauthorized',
	403 => 'Forbidden',
	404 => 'Not found',
	500 => 'Internal server error',
	502 => 'Bad gateway',
	503 => 'Service unavailable',
];

try
{
	/** Если код ответа не успешный - возвращаем сообщение об ошибке  */
	if ($code < 200 || $code > 204) {
		throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code);
	}
}
catch(\Exception $e)
{
	die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
}

/**
 * Данные получаем в формате JSON, поэтому, для получения читаемых данных,
 * нам придётся перевести ответ в формат, понятный PHP
 */
$response = json_decode($out, true);


echo 'Поздравляем, сделка создана!Данные о сделке';
var_dump($response);
?>