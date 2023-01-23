<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body onload="document.forms['payment'].submit();">
    <form method="POST" action="https://payment-sandbox.pa-sys.com/app/page/5ed1d178-d967-43b0-8c40-b11b15e6ee9c" name="payment" accept-charset="utf-8">
        @foreach ($fields as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}" />
        @endforeach
    </form>
</body>

</html>