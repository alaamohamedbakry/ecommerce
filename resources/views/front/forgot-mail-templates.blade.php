<p>Dear :{{ $customer->name }}</p>
<p>we are received a request to the password from hope ecommerce associated with : {{ $customer->email }}
    you can reset your password by click on the button below:
    <br>
    <a href="{{ $actionlink }}" target="_blank" style="color: white;border-color: greenyellow;border-style: solid;border-width: 5px 10px;background-color: greenyellow;text-decoration: none;
    border-radius: 3px;border-shadow:0 2px 3px rgba(0,0,0,0);-webkit-text-size-adjust: none;box-sizing: border-box;">
        Reset password</a>
        <br>
        <b>NB:</b> this link will be inavalied in 15 minutes
        <br>
</p>