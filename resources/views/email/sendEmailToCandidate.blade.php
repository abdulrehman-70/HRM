<!DOCTYPE html>

<html>
<head>
    <title></title>
</head>
<body>

    <h2>{{$details['title'] }}</h2>
    <h4>{{$details['candidate_name'] }}</h4>
    <p>{{$details['body'] }}</p>
    <a target="_blank" href="{{ $details['meeting_link'] }}">{{ $details['meeting_link'] }}</a>
    <p>Thank you!</p>

</body>
</html>
