@extends('layouts.layout')

@section('title', 'Foxly Alpha - Terms of Use')

@section('content')
<div class="container" style="max-width: 800px;">
    <h1 class="mb-4 text-danger">Terms of Use</h1>

    <p>Last updated: 28 June 2025</p>

    <p>By using the <strong>Foxly Alpha - URL Shortener</strong> service ("Service", "we", "our", "us") provided at <a href="{{ url('/') }}">{{ url('/') }}</a>, you agree to the following terms and conditions. If you do not agree with these terms, please do not use the service.</p>

    <h4 class="mt-4 text-danger">1. Acceptable Use</h4>
    <p>You agree to use this service only for lawful purposes. You are not allowed to shorten URLs that:</p>
    <ul>
        <li>Link to illegal, harmful, or malicious content</li>
        <li>Contain phishing or deceptive material</li>
        <li>Spread malware or viruses</li>
        <li>Violate copyright or intellectual property rights</li>
        <li>Are used to send spam or unsolicited messages</li>
    </ul>

    <h4 class="mt-4 text-danger">2. User Accounts</h4>
    <p>If you create an account, you are responsible for maintaining the confidentiality of your credentials and all activities under your account. You must provide accurate information and keep it up to date.</p>

    <h4 class="mt-4 text-danger">3. Service Availability</h4>
    <p>We reserve the right to modify, suspend, or discontinue the service at any time, with or without notice. We are not liable for any data loss or interruption.</p>

    <h4 class="mt-4 text-danger">4. Limitation of Liability</h4>
    <p>We are not liable for any damages resulting from the use or inability to use the service. All links created using our service are the responsibility of the user who created them.</p>

    <h4 class="mt-4 text-danger">5. Privacy Policy</h4>
    <p>We respect your privacy. Any data collected through this service is handled according to our <a href="/privacy">Privacy Policy</a> (if available).</p>

    <h4 class="mt-4 text-danger">6. Changes to These Terms</h4>
    <p>We may update these terms from time to time. Continued use of the service after such changes indicates your acceptance of the new terms.</p>

    <h4 class="mt-4 text-danger">7. Contact</h4>
    <p>If you have any questions about these Terms of Use, please <a href="{{ route('contact') }}">contact us</a>.</p>

    <p class="mt-5">Thank you for using <strong>{{ config('app.name', 'URL Shortener') }}</strong>.</p>
</div>
@endsection
