@extends('layouts.index')

@section('content')

<header id="header">

    @include('layouts.navigation')


    <div class="section-outer-container" id="about">
        <div class="container">
            <div class="section-inner-container">
    
              <div id="services-title-container">
                <h2 class="title-align-center logo-colored">ჩვენ შესახებ</h2>
              </div>
    
              <div>

                <p class="text-main-formatting">
ჩვენ ვართ გუნდი, რომელიც შედგება სამართლის ყველა სფეროში გამოცდილი კვალიფიციური იურისტებისგან. ჩვენი ცოდნა და გამოცდილება გავაერთიანეთ იმისათვის, რომ სრულყოფილი იურიდიული მომსახურება შეგვეთავაზებინა როგორც ქართველი, ასევე უცხოელი კლიენტებისათვის.                 </p>
    
                <p class="text-main-formatting">
                    ბაზარზე არსებული სხვა იურიდიული კომპანიებისგან იმით განვსხვავდებით, რომ ჩვენთვის საზღვრები არ არსებობს. ჩვენ ვპასუხობთ ყველა გამოწვევას და ვართ ხელმისაწვდომი ყოველთვის.                
                </p>


                <p class="text-main-formatting">
                    აქ იპოვნით პასუხს თქვენს ყველა სამართლებრივ შეკითხვაზე, ყველა შესაძლო რისკსა და მათი დაზღვევის გზებს, <span class="logo-colored">აქ იპოვნით გამოსავალს გამოუვალ სიტუაციაში.</span>                 
                </p>

              </div>
        
            </div>
        </div>
    </div>
    
    
</header>


@include('layouts.footer')
    
@endsection