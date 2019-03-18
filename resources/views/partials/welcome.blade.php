<style>
    .line-1{
        /*position: relative;*/
        /*top: 50%;*/
        width: 24em;
        margin: 0 auto;
        border-left: 2px solid rgba(0, 0, 0, 0.75);
        font-size: 180%;
        text-align: center;
        white-space: nowrap;
        overflow: hidden;
        transform: translateY(-50%);
    }

    /* Animation */
    .anim-typewriter {
        animation: typewriter 4s steps(44) infinite normal , blinkTextCursor 500ms steps(44) infinite normal;
    }
    @keyframes typewriter{
        from{width: 0;}
        to{width: 17em;}
    }
    @keyframes blinkTextCursor{
        from{border-left-color: rgba(0, 0, 0, 0.75);}
        to{border-left-color: transparent;}
    }
</style>
<!--------------------- WELCOME SECTION ------------------------>
<div class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <p id="typewriter_text" style="display: none;" class=""> با ایکس بادی ایران تفاوت را لمس کنید </p>
        </div>
        <hr>
        <div class="col-12">
            <h1>
                شما به دنبال یک برنامه آموزشی متنوع، مربیان حرفه ای، آموزش نوآورانه و استودیو درجه یک هستید؟ پس شما در جای مناسبی یعنی ایکس بادی ایران هستید. ما شما را به اهدافتان می رسانیم. آیا شما یک ورزشکار باتجربه هستید و یا فقط می خواهید سبک زندگیتان را فعال تر و سالم تر کنید. در استدیو های ورزشی ما با آخرین متد چربی سوزی و عضله سازی روز دنیا آشنا شوید.
            </h1>
        </div>
    </div>
</div>
<!--------------------- END WELCOME SECTION ------------------------>

