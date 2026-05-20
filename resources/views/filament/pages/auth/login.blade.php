<x-filament-panels::page.simple>

<style>

    .fi-simple-layout-content{
        max-width:100% !important;
        padding:0 !important;
    }

    .fi-simple-header{
        display:none !important;
    }

    body{
        margin:0;
        font-family:'Inter',sans-serif;
        background:linear-gradient(135deg,#eef3ff 0%,#f7faff 100%);
        overflow-x:hidden;
    }

    .wave-bg{
        position:fixed;
        inset:0;
        z-index:-1;
        opacity:.45;
    }

    .login-wrapper{
        min-height:100vh;
        display:flex;
        align-items:center;
        justify-content:center;
        padding:20px;
    }

    .login-card{
        width:100%;
        max-width:500px;
        background:rgba(255,255,255,.96);
        border-radius:32px;
        padding:38px;
        box-shadow:
            0 10px 40px rgba(20,71,230,.10),
            0 2px 10px rgba(0,0,0,.05);
        border:1px solid rgba(255,255,255,.7);
        backdrop-filter:blur(10px);
    }

    .logo-wrap{
        text-align:center;
        margin-bottom:28px;
    }

    .logo-circle{
        width:88px;
        height:88px;
        margin:auto;
        border-radius:50%;
        background:linear-gradient(135deg,#1447e6,#2563eb);
        display:flex;
        align-items:center;
        justify-content:center;
        box-shadow:0 10px 25px rgba(20,71,230,.25);
    }

    .logo-icon{
        width:40px;
        height:40px;
        color:white;
    }

    .title{
        margin-top:18px;
        color:#1447e6;
        font-size:24px;
        font-weight:700;
        line-height:1.4;
        text-align:center;
    }

    .subtitle{
        margin-top:8px;
        color:#6b7280;
        font-size:15px;
        text-align:center;
    }

    .clock-box{
        margin-top:28px;
        margin-bottom:28px;
        background:linear-gradient(135deg,#f8fbff,#eef4ff);
        border:1px solid #dbe4ff;
        border-radius:22px;
        padding:18px;
        display:flex;
        align-items:center;
        gap:16px;
    }

    .clock-icon-wrap{
        width:64px;
        height:64px;
        background:white;
        border-radius:18px;
        display:flex;
        align-items:center;
        justify-content:center;
        flex-shrink:0;
        box-shadow:0 5px 15px rgba(20,71,230,.08);
    }

    .clock-icon{
        width:32px;
        height:32px;
        color:#1447e6;
    }

    .clock-time{
        color:#1447e6;
        font-size:32px;
        font-weight:700;
        line-height:1;
    }

    .clock-date{
        margin-top:5px;
        color:#6b7280;
        font-size:14px;
    }

    .fi-input-wrp{
        border-radius:16px !important;
        overflow:hidden;
    }

    .fi-input{
        height:54px !important;
        font-size:15px !important;
    }

    .fi-form-actions{
        margin-top:20px !important;
    }

    .fi-form-actions button{
        width:100% !important;
        height:56px !important;
        border:none !important;
        border-radius:16px !important;
        background:linear-gradient(135deg,#1447e6,#2563eb) !important;
        color:white !important;
        font-size:17px !important;
        font-weight:600 !important;
        display:flex !important;
        align-items:center !important;
        justify-content:center !important;
        box-shadow:0 10px 20px rgba(20,71,230,.20);
        transition:.3s;
    }

    .fi-form-actions button:hover{
        transform:translateY(-2px);
        opacity:.95;
    }

    .footer-text{
        text-align:center;
        margin-top:26px;
        color:#6b7280;
        font-size:13px;
        line-height:1.7;
    }

    @media(max-width:640px){

        .login-card{
            padding:28px 22px;
            border-radius:24px;
        }

        .title{
            font-size:21px;
        }

        .clock-box{
            flex-direction:column;
            text-align:center;
        }

        .clock-time{
            font-size:28px;
        }

        .clock-date{
            font-size:13px;
        }

        .fi-input{
            height:50px !important;
            font-size:14px !important;
        }

        .fi-form-actions button{
            height:52px !important;
            font-size:15px !important;
        }

        .logo-circle{
            width:76px;
            height:76px;
        }

        .logo-icon{
            width:34px;
            height:34px;
        }
    }

</style>

<svg class="wave-bg" viewBox="0 0 1440 800" fill="none">

    <path fill="#dbe7ff"
        d="M0,320L80,352C160,384,320,448,480,426.7C640,405,800,299,960,266.7C1120,235,1280,277,1360,298.7L1440,320V800H0Z">
    </path>

    <path fill="#c7d8ff"
        opacity=".5"
        d="M0,500L60,470C120,440,240,380,360,390C480,400,600,480,720,490C840,500,960,440,1080,410C1200,380,1320,380,1380,380L1440,380V800H0Z">
    </path>

</svg>

<div class="login-wrapper">

    <div class="login-card">

        <div class="logo-wrap">

            <div class="logo-circle">

                <svg class="logo-icon"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3 17l6-6 4 4 8-8M14 7h7v7" />

                </svg>

            </div>

            <div class="title">
                Samudra Nusantara <br>
                Eich
            </div>

            <div class="subtitle">
                Cash Management System
            </div>

        </div>

        <div class="clock-box">

            <div class="clock-icon-wrap">

                <svg class="clock-icon"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z" />

                </svg>

            </div>

            <div>

                <div class="clock-time" id="clock">
                    00:00:00
                </div>

                <div class="clock-date" id="date">
                    Loading...
                </div>

            </div>

        </div>

        <form wire:submit="authenticate">

    {{ $this->form }}

    <div class="fi-form-actions">

        <button type="submit">
            Sign In
        </button>

    </div>

</form>

        <div class="footer-text">
            © 2026 PT Samudranusantaraeich.id <br>
            All rights reserved.
        </div>

    </div>

</div>

<script>

    function updateClock(){

        const now = new Date();

        const time = now.toLocaleTimeString('id-ID');

        const date = now.toLocaleDateString('id-ID',{
            weekday:'long',
            year:'numeric',
            month:'long',
            day:'numeric'
        });

        document.getElementById('clock').innerHTML = time;
        document.getElementById('date').innerHTML = date;
    }

    setInterval(updateClock,1000);

    updateClock();

</script>

</x-filament-panels::page.simple>s