<x-mail::message>
# Nouvelle demande de contact

Une nouvelle demande de contact à été envoyée pour le bien <a href="{{ route('properties.show', ['slug' => $property->getSlug(),'property' => $property]) }}">{{ $property->title }}</a>

- Prénom : {{ $data['firstname'] }}
- Nom : {{ $data['lastname'] }}
- Téléphone : {{ $data['phone'] }}
- Courriel : {{ $data['email'] }}

**Message : **<br/>
{{ $data['message'] }}

</x-mail::message>
