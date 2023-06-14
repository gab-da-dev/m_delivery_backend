<div
    x-data="{ open: false, order: false, product: false, order_status: $wire.order_status, edit: false, order_type:false, home:true }">
   

    <div class="md:h-screen h-80 bg-orange-500 mx-auto text-center py-12" id="jumbotron"
        style="background-repeat: no-repeat; background-image: url('Coding workshop-pana(1).png'); background-attachment: fixed; background-size: 100% 100%;">
        <h2 class="text-3xl leading-9 font-bold tracking-tight text-white sm:text-4xl sm:leading-10">

        </h2>
        <div class="mt-8 flex justify-center">
            <div class="inline-flex rounded-md bg-white shadow">

            </div>
        </div>
    </div>
    

    <div>
        <div class="flex flex-col mt-6 text-gray-700 items-center mt-20 mb-8 mx-2 animation">
            <h1 class="text-3xl animation">Momo Technologies</h1>
            <hr class="w-48 h-1 mx-auto my-4 bg-gray-600 border-0 rounded md:my-10 dark:bg-gray-800">
            <p class="mt-4 animation">We are a South African based software company that specialises in everything web development. Got an
                idea? We can bring it to life!</p>
        </div>

        <div class="flex flex-col mt-6 text-gray-700 items-center mt-20 mb-8 mx-2">
            <h1 class="text-3xl animation items-center">Our Services</h1>
            <hr class="w-48 h-1 mx-auto my-4 bg-gray-600 border-0 rounded md:my-10 dark:bg-gray-800">

            <div class="flex flex-col md:flex-row animation">
                <div class="md:w-1/2 w-full">
                    <img src="Website designer-pana(1).png" alt="">
                </div>
                <div class="md:w-1/2 w-full my-auto">
                <h1 class="text-3xl animation items-center">Web Applications</h1>
            <hr class="w-48 h-1 my-4 bg-gray-600 border-0 rounded md:my-10 dark:bg-gray-800">
                    <h1 class="mt-4">We create bespoke web applications for our clients. From e-commerce stores to blogs
                        to web services that translate to your everyday business operations. We can get it online for you.<br><br> Our hosting plan insures that your web application is always online.</h1>
                </div>
            </div>

            <div class="flex flex-col md:flex-row animation">
                <div class="md:w-1/2 w-full my-auto">
                <h1 class="text-3xl items-center">E-commerce</h1>
            <hr class="w-48 h-1 my-4 bg-gray-600 border-0 rounded md:my-10 dark:bg-gray-800">
                    <h1 class="mt-4">Want to create a online store? Talk to us. We can setup a online store complete with real time functionalities to help you engage better with your clients and drivers. </h1><br>
                    <a href="/home" class="bg-indigo-500 text-white rounded p-2">Go to demo</a>
                </div>
                <div class="md:w-1/2 w-full">
                    <img src="In no time-pana.png" alt="">
                </div>
            </div>

            <div class="flex flex-col md:flex-row animation">
                <div class="md:w-1/2 w-full">
                    <img src="Usability testing-pana(1).png" alt="">
                </div>
                <div class="md:w-1/2 w-full my-auto">
                <h1 class="text-3xl animation items-center">Flutter Development</h1>
            <hr class="w-48 h-1 my-4 bg-gray-600 border-0 rounded md:my-10 dark:bg-gray-800">
                    <h1 class="mt-4">App development? we are your team. Using Google's flutter framework, we are able to rapidly develop a prototype for you.<br>
                With its added feature of being cross platform, one code base can create you and Android and IOS app.</h1>
                </div>
            </div>

        </div>
    </div>

    <div class="bg-gray-500 shadow-2xl mx-auto text-center py-12 mt-20 text-white text-2xl">
        <div>
            Got a project in mind? <br> contact us on 076 158 7176 or email us on gabriel.molopo@gmail.com
        </div>
    </div>


<style>

.animation {
    opacity: 0;
    transform: translateX(-300px);
    transition: all 0.7s ease-out;
    transition-delay: 0.4s;

}

.scroll-animation {
    opacity: 1;
    transform: translateX(0);
}
</style>

<script>
    const the_animation = document.querySelectorAll('.animation')

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('scroll-animation')
        }
            else {
                entry.target.classList.remove('scroll-animation')
            }
        
    })
},
   { threshold: 0.5
   });
//
  for (let i = 0; i < the_animation.length; i++) {
   const elements = the_animation[i];

    observer.observe(elements);
  } 
</script>


</div>
