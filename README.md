# PHP-Essential-plugin
PHP essential plugin 입니다

## HOW-To-Use
/config/user_conf.php를 열어 db => 에 있는 array를 수정해주세요<br><br>

host => db의 host [localhost]<br>
user => 유저명 <br>
pass => 비밀번호 <br>
database => db 이름 <br>
<br>
그리고 index.php로 접속해보면 hello module! 이라는 메세지가 뜬다면 성공입니다!<br>

## 설명
### 함수 리스트<br>
executequery($query) : sql쿼리를 실행합니다.<br>
리턴 형식 : stdClass<br>
~~~
stdclass(
  sql => 쿼리 문,
  status => 성공 상태(200, 404),
  sum => select시 선택된 개수
  data => array(
    [0] => db에 있는 값
    .. sum 만큼의 배열이 있음
  ),
)
~~~
<br>
sql_secure($val) : get이나 post로 들어온 값의 sql 인젝션을 막습니다<br>
리턴 형식 : String<br><br>

include_module($module) : /module/$module/$module.class.php 파일을 불러옵니다<br>
리턴 없음<br><br>

__get($var) : $_GET['var']와 같습니다. <br><br>
__post($var) : $_POST['var']와 같습니다. <br><br>
__require($var) : $_REQUIRE['var']와 같습니다. <br><br>
isSecure() : https 연결인지 http 연결인지 확입합니다<br>
리턴 값 : Boolean<br>
