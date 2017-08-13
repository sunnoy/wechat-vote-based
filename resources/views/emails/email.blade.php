<body>
<div align="center">
    <h1>水质监测站投票</h1>
    <h3>投票数为: <span style="font-style: italic;color: red;font-weight:bold;font-size: xx-large">{{ $num-1 }}</span>张票</h3>

    <img src="{{ $message->embed(@storage_path('app/vote.png')) }}">
</div>

</body>