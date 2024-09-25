<x-mail::message>
# New contact form submission

A new contact form submission has been sent.

- First Name : {{ $data['firstname'] }}
- Last Name : {{ $data['lastname'] }}
- Phone : {{ $data['phone'] }}
- Email : {{ $data['email'] }}

**Subject : **<br/>
{{ $data['subject'] }}


**Message : **<br/>
{{ $data['message'] }}

</x-mail::message>
