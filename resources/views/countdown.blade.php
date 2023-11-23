<ul id="countdown">
    <li id="days">
        <div class="number">00</div>
        <div class="label">يوم</div>
    </li>
    <li id="hours">
        <div class="number">00</div>
        <div class="label">ساعة</div>
    </li>
    <li id="minutes">
        <div class="number">00</div>
        <div class="label">دقيقة</div>
    </li>
    <li id="seconds">
        <div class="number">00</div>
        <div class="label">ثانية</div>
    </li>
</ul>

@push('js')
    <style>
        ul#countdown {
            width: 50%;
            margin: 0 auto;
            padding: 15px 0 20px 0;
            color: #0c844d;
            border-width: 1px 0;
            overflow: hidden;
            font-family: 'Arial Narrow', Arial, sans-serif;
            font-weight: bold;
        }

        ul#countdown li {
            margin: 0 -3px 0 0;
            padding: 0;
            display: inline-block;
            width: 25%;
            font-size: 6vw;
            text-align: center;
        }

        ul#countdown li .label {
            color: #c8a638;
            font-size: 1.5vw;
            text-transform: uppercase;
        }

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <script>

        let targetDate = new Date('{{ now('Asia/Riyadh')->addDay(3)->endOfDay() }}');

        let days;
        let hrs;
        let min;
        let sec;


        $(function() {
            timeToLaunch();
            numberTransition('#days .number', days, 1000, 'easeOutQuad');
            numberTransition('#hours .number', hrs, 1000, 'easeOutQuad');
            numberTransition('#minutes .number', min, 1000, 'easeOutQuad');
            numberTransition('#seconds .number', sec, 1000, 'easeOutQuad');
            setTimeout(countDownTimer,1001);
        });


        function timeToLaunch(){
            let currentDate = new Date();

            let diff = (targetDate - currentDate) / 1000;
            diff = Math.abs(Math.floor(diff));

            days = Math.floor(diff / (24 * 60 * 60));
            diff -= days * 24 * 60 * 60;

            hrs = Math.floor(diff / (60 * 60));
            diff -= hrs * 60 * 60;

            min = Math.floor(diff / 60);
            diff -= min * 60;

            sec = diff;
        }

        function countDownTimer() {
            timeToLaunch();

            $( "#days .number" ).text(days);
            $( "#hours .number" ).text(hrs);
            $( "#minutes .number" ).text(min);
            $( "#seconds .number" ).text(sec);

            setTimeout(countDownTimer,1000);
        }

        function numberTransition(id, endPoint, transitionDuration, transitionEase){
            $({numberCount: $(id).text()}).animate({numberCount: endPoint}, {
                duration: transitionDuration,
                easing:transitionEase,
                step: function() {
                    $(id).text(Math.floor(this.numberCount));
                },
                complete: function() {
                    $(id).text(this.numberCount);
                }
            });
        }
    </script>
@endpush
