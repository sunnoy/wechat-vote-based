<body>
<div align="center">
    <h1>水质监测站投票</h1><br/>
    <h2>日期: <span style="font-weight:bold">{{  date("m-d") }}</span></h2><br/>
    <h2>投票数为: <span style="font-style: italic;color: red;font-weight:bold;font-size: large">{{ $num-1 }}</span>张票</h2>

    <img src="{{ $message->embed(@storage_path('app/vote.png')) }}">
</div>

</body>