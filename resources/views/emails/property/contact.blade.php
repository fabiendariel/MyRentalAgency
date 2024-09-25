<x-mail::message>
# New property information request

A new property information request has been sent for the property <a href="{{ route('properties.show', ['slug' => $property->getSlug(),'property' => $property]) }}">{{ $property->title }}</a>

- First Name : {{ $data['firstname'] }}
- Last Name : {{ $data['lastname'] }}
- Phone : {{ $data['phone'] }}
- Email : {{ $data['email'] }}

**Message : **<br/>
{{ $data['message'] }}

</x-mail::message>