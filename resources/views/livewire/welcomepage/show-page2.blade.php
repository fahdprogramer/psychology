<div class="landing is-preload text-white " style="background-image: url('/images/banner.jpg');background-position: top;
    background-repeat: repeat;background-size: cover ;position:relative;font-family: 'Marhey', serif; font-weight: 312; background-attachment: fixed;">

    <!-- Page Wrapper -->
    <div id="page-wrapper" class="">
        <!-- Banner -->
        <section id="banner" class=" min-h-[85svh] flex justify-center items-center bg-black bg-opacity-50">
            <div class="inner text-center text-white text-2xl">
                <a href="{{ route('welcome') }}" class='flex justify-center items-center mt-14'>
                    <img src="images/icon/1.png" class="w-48" alt="">
                </a>
                <div class="border-y-2 w-fit p-4 mx-auto text-5xl">
                   <h2 class="" style="font-family: 'Great Vibes', cursive;
                   font-weight: 400;
                   font-style: normal;">Student's Haven</h2> 
                </div>
                
                <p class="font-serif my-7 text-lg sm:text-2xl">
                    رفيقك النفسي من
                    أجل أفضل تحصيل أكاديمي
                </p>
                @guest
                   <ul class="actions special mb-7">
                    <li><a href="{{route('login')}}" class="button primary text-lg rounded-md bg-violet-600 bg-opacity-20 px-5 py-2">تسجيل الدخول</a></li>
                </ul> 
                @endguest
                
            </div>
            <a href="#one" class="more scrolly"></a>
        </section>

        <!-- One -->
        <section id="one" class="wrapper style1 special h-96 bg-black bg-opacity-75 flex justify-center items-center">
            <div class="inner">
                <header class="major px-4" dir="rtl">
                    <h1 style=" line-height: 2em" class="text-center mb-3">
                        <span style="font-size:2.5em;">&#8221;</span>
                         اعترف بالظلام الذي بداخلك، وإلا سيسيطر عليك. ولا يمكنك اكتشاف تلك الظلمات بمفردك؛                         <br>
                          فالرحلة تحتاج إلى رفقة مختص يمكنه إرشادك في حالة الحاجة.
                        <span style="font-size: 2.5em;">&#8220;</span>
                    </h1>
                    <div style="display: flex;flex-direction:column ;justify-content: center; align-items: center;">
                        <div class="circle-container">
                            <img src="images/psy.jpg" alt="Circular Image" class="circle-image w-24 h-24" style=" border-radius: 50%;">
                        </div>
                        <h3>
                            كارل يونغ
                        </h3>
                    </div>
                </header>
            </div>
        </section>

        <!-- Two -->
        <section id="two" class="pb-40 wrapper alt style2 px-5 py-10  bg-[#2e3842] bg-opacity-80">
            <section class="spotlight grid grid-cols-1 sm:grid-cols-3 gap-0 sm:gap-9 p-10 px-5 sm:px-10 bg-[#2a333d] border rounded-2xl" data-animation-direction="animate__fadeInRight">
                <div class="image flex justify-center item-center mb-3 sm:mb-0  w-full"><img class="" src="images/pic01.jpg" alt="" /></div>
                <div class="content col-span-2 flex justify-center items-center" dir="rtl">
                    <div>
                         <h2 class="text-2xl mb-3">تقديم الدعم النفسي للطلاب من أجل مواجهة تحديات الحياة الجامعية</h2>
                    <p class="text-base text-justify">
                        يقدم الدعم النفسي والمعنوي للطلاب دوراً أساسياً في تسهيل التكيف مع تحديات الحياة الجامعية. يساعد الدعم المستمر للطلاب في التعرف على المشكلات التي قد تواجه الطالب في مساره الجامعي  وعلى التحكم فيها وإرشادهم لطرق تجاوزها.
ذلك يعزز من قدرتهم على إدارة الوقت وتحقيق التوازن بين الدراسة والحياة الشخصية. بالإضافة إلى ذلك، يعزز الدعم النفسي والأكاديمي الثقة بالنفس والاستقلالية، مما يسهم في تحقيق أداء أكاديمي أفضل ونمو شخصي واجتماعي مستدام.
</p>
                    </div>
                   
                </div>
            </section>
            <section class="spotlight mt-10 grid grid-cols-1 sm:grid-cols-3 gap-0 sm:gap-9 p-10 px-5 sm:px-10 bg-[#2a333d] border rounded-2xl" data-animation-direction="animate__fadeInRight">
               
                <div class="col-span-2  flex justify-center items-center">
                    <div class="">
                       <h2 class="text-2xl mb-3">
                        الطالب في أياد آمنة
                    </h2>
                    <p class="text-base text-justify">
                        يلعب الأخصائي النفسي دوراً حاسماً في دعم ومساندة الطلاب الجامعيين في مواجهة تحدياتهم النفسية. بفضل خبرتهم وتخصصهم، يقدمون مساعدة متخصصة تتناسب مع احتياجات الطلاب، سواء في التعامل مع ضغوط الدراسة والامتحانات، أو في التعامل مع القلق، الاكتئاب، أو أي صعوبات أخرى قد تؤثر على أدائهم الأكاديمي والشخصي.
                     </p> 
                    </div>
                    
                </div>
                <div class="image flex justify-center item-center  w-full"><img class="" src="images/pic03.png" alt="" style="filter: invert(85%);"/></div>
            </section>

            <section class="spotlight grid grid-cols-1 sm:grid-cols-3 gap-0 sm:gap-9 mt-10 p-10 px-5 sm:px-10 bg-[#2a333d] border rounded-2xl" data-animation-direction="animate__fadeInRight">
                <div class="image flex justify-center item-center  w-full"><img class="" src="images/pic02.png" alt="" /></div>
                <div class="content col-span-2 flex justify-center items-center" dir="rtl">
                    <div>
                        <h2 class="text-2xl mb-3">
                            التقنية في خدمة علم النفس
                        </h2>
                        <p class="text-base text-justify">
                            تعتبر التقنية عنصراً حيوياً في تقدم علم النفس، حيث تساهم في تحليل البيانات الضخمة وفهم الأنماط السلوكية والعقلية بشكل أعمق. من خلال التطبيقات المتقدمة مثل الذكاء الاصطناعي والتعلم الآلي، نجح الباحثون في تحديد  التشخيص بسرعة أكبر، وتطوير أساليب علاجية مبتكرة، مما يعزز من كفاءة الرعاية النفسية ويساهم في تحسين النتائج العلاجية للأفراد. </p>
                            
                    </div>
                   
                </div>
            </section>
            @guest
                      <!-- CTA -->
        <section id="cta" class="wrapper style4 h-44 flex justify-center items-center text-xl">
            <div class="inner">
                <header dir="rtl">
                    <h2> ماذا تنتظر !</h2>
                    <p class="font-serif my-5">
                        سجل دخولك وباشر مرافقتك نتمنى لك مشوارا موفقا 
                    </p>
                    @guest
                        <ul class="actions special ">
                        <li><a href="{{route('login')}}" class="button primary text-lg rounded-md bg-violet-600 bg-opacity-20 px-5 py-2">تسجيل الدخول</a></li>
                    </ul>
                    @endguest
                    
                </header>
            </div>
        </section>
            @endguest
          
        </section>

    

        

    </div>

  
</div>
