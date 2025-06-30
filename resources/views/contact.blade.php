@extends('layouts.layout')

@section('title', 'Foxly Alpha - Contact')

@section('content')
<div class="container" style="max-width: 800px;">
    <h1 class="mb-4 text-danger">Contact Us</h1>

    <p>Have questions, feedback, or suggestions? We'd love to hear from you! Please feel free to reach out using the information below.</p>

    <div class="mt-4">
        <h5 class="text-danger"><i class="bi bi-envelope"></i> Email</h5>
        <p>
            <a href="mailto:vsly@gmx.us">vsly@gmx.us</a><br>
            Response time: tentative
        </p>
    </div>

    <div class="mt-4">
        <h5 class="text-danger"><i class="bi bi-chat-dots"></i> Social Media</h5>
        <p>
            Follow or message us on our official social media accounts:
        </p>
        <!-- Visit https://link.vausly.com -->
        <p><button class="btn btn-danger" onclick="window.open('https://link.vausly.com', '_blank')">Visit our social media</button></p>
    </div>

    <div class="mt-4">
        <h5 class="text-danger"><i class="bi bi-question-circle"></i> Need Help?</h5>
        <p>
            For common questions, please check our <a href="/terms">Terms of Use</a> or reach out directly.
        </p>
    </div>

    <p class="mt-5">We appreciate your support and feedback. Thank you for using <strong>Foxly Alpha - URL Shortener</strong>!</p>
</div>
@endsection
