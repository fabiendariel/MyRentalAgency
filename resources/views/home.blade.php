@extends('base')

@section('title', 'Homepage')

@section('content')

<div class="bg-light p-5 mb-5 text-justify">
  <div class="container">
    <h1>Bienvenue à MyRentalAgency</h1>

    <p>Découvrez votre nouvel espace de vie avec MyRentalAgency. Spécialisés dans la vente, l'achat et la location de propriétés résidentielles et commerciales à Montréal, nous nous engageons à vous offrir une expérience immobilière exceptionnelle.</p>

    <p>Que vous recherchiez une maison chaleureuse pour votre famille, un appartement moderne en plein cœur de la ville ou un espace commercial idéalement situé, notre équipe dévouée est là pour vous guider à chaque étape du processus.</p>

    <p>Nos Services :</p>

    <ul>
      <li>Vente et Achat : Trouvez la propriété qui correspond à vos besoins et à votre style de vie grâce à notre vaste portefeuille de biens immobiliers.</li>

      <li>Location : Découvrez nos annonces de locations résidentielles et commerciales, adaptées à vos exigences de budget et d'emplacement.</li>

      <li>Gestion Immobilière : Simplifiez la gestion de votre investissement immobilier avec nos services de gestion locative professionnels.</li>

      <li>Évaluation : Obtenez une évaluation précise de la valeur de votre bien immobilier grâce à notre expertise locale et notre connaissance approfondie du marché.</li>
    </ul>

    <p>Pourquoi Choisir MyRentalAgency ?</p>

    <ul>
      <li>Expertise Locale : Nous sommes ancrés dans la communauté de Montréal, avec une connaissance approfondie du marché immobilier local.</li>

      <li>Service Personnalisé : Chaque client est unique. Nous vous offrons un service personnalisé et attentif pour répondre à vos besoins spécifiques.</li>

      <li>Intégrité et Professionnalisme : Notre engagement envers l'intégrité, la transparence et le professionnalisme assure une expérience client fiable et de confiance.</li>
    </ul>

    <p>Explorez notre site pour découvrir nos propriétés disponibles, en apprendre davantage sur nos services et nous contacter pour commencer votre prochaine aventure immobilière avec MyRentalAgency.</p>
  </div>
</div>

<div class="container">
  <h2>Nos derniers biens</h2>
  <div class="row">
    @foreach ($properties as $property)
        <div class="col">
          @include('properties.card')
        </div>
    @endforeach
  </div>
</div>
    
@endsection