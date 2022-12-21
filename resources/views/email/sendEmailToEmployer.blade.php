<!DOCTYPE html>

<html>
<head>
    <title></title>
</head>
<body>

    <h2>{{$mailDetails['title'] }}</h2>
    {{-- <h4>{{$mailDetails['candidate_name'] }}</h4> --}}
    <p>{{$mailDetails['body'] }}</p>
    <a target="_blank" href="{{ $mailDetails['meeting_link'] }}">{{ $mailDetails['meeting_link'] }}</a>
    <p>{{ $mailDetails['Scheduled_Time'] }}</p>
    <p>Thank you!</p>

</body>
</html>
