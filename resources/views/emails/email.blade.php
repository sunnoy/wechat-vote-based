<body>
<div align="center">
    <h1>水质监测站投票</h1>
    <h2>水质监测站<span style="font-style: italic">{{ date("m-d") }}</span>投票数为<span style="font-style: italic;color: red">{{ $num-1 }}</span>张票</h2>

    <img src="{{ $message->embed(@storage_path('app/vote.png')) }}">
</div>

</body>