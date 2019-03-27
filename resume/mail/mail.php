<?PHP
    //引入PHPMailer的核心文件 使用require_once包含避免出现PHPMailer类重复定义的警告
namespace mail;
include 'PHPMailer\PHPMailer.php';
include 'PHPMailer\Exception.php';
include 'PHPMailer\POP3.php';
include 'PHPMailer\OAuth.php';
include 'PHPMailer\SMTP.php';

class mail
 {
    public $mail;
    function __construct()
     {
        $mail = new \PHPMailer\PHPMailer\PHPMailer();
         
        //是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
        // $mail->SMTPDebug = 1;
         
        //使用smtp鉴权方式发送邮件，当然你可以选择pop方式 sendmail方式等 本文不做详解
        //可以参考http://phpmailer.github.io/PHPMailer/当中的详细介绍
        $mail->isSMTP();
        //smtp需要鉴权 这个必须是true
        $mail->SMTPAuth=true;
        //链接qq域名邮箱的服务器地址
        $mail->Host = 'smtp.qq.com';
        //设置使用ssl加密方式登录鉴权
        $mail->SMTPSecure = 'ssl';
        //设置ssl连接smtp服务器的远程服务器端口号 可选465或587
        $mail->Port = 465;
        //设置smtp的helo消息头 这个可有可无 内容任意
        $mail->Helo = 'Hello smtp.qq.com Server';
        //设置发件人的主机域 可有可无 默认为localhost 内容任意，建议使用你的域名
        $mail->Hostname = 'jjonline.cn';
        //设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
        $mail->CharSet = 'UTF-8';
        //设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
        $mail->FromName = '';
        //smtp登录的账号 这里填入字符串格式的qq号即可
        $mail->Username ='529428574@qq.com';
        //smtp登录的密码 这里填入“独立密码” 若为设置“独立密码”则填入登录qq的密码 建议设置“独立密码”
        $mail->Password = 'klcbnbbgyqusbhhh';
        //设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
        $mail->From = '529428574@qq.com';
        //邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
        $mail->Subject = '系统邮件';
        $mail->isHTML(true); 
        $this->mail=$mail;
     }

        function send($content,$mail,$title)
        {
            $this->mail->FromName = '系统邮件';
            $this->mail->addAddress($mail,$title);
            $this->mail->Body = $content;
           return  $status = $this->mail->send();
        }

 }







