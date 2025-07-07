<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    @livewireStyles
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            background: #f4f7fa;
        }
        .chat-app-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden; /* Tambahkan ini */
        }
        .chat-header {
            background: #fff;
            border-bottom: 1px solid #e3e6f0;
            box-shadow: 0 1px 2px rgba(0,0,0,0.03);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .chat-main {
            flex: 1;
            display: flex;
            min-height: 0;
            overflow: hidden; /* Tambahkan ini */
        }
        .chat-content-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 0;
            max-width: 100%; /* Tambahkan ini */
            overflow: hidden; /* Tambahkan ini */
        }
        @media (max-width: 700px) {
            .chat-content-area {
                max-width: 100vw;
                min-height: 100vh;
                border-radius: 0;
            }
        }
        /* Remove scroll on body, let chat handle it */
        body, html {
            overflow: hidden;
        }

        /* Tambahkan style baru */
        .messages-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 0;
            width: 100%; /* Tambahkan ini */
            overflow: hidden; /* Tambahkan ini */
        }

        #messages-area {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden; /* Tambahkan ini */
            width: 100%; /* Tambahkan ini */
        }

        .input-container {
            flex-shrink: 0;
            width: 100%;
            background: white;
            border-top: 1px solid #e3e6f0;
            padding: 1rem;
            position: relative;
            bottom: 0;
        }

        /* Tambahkan untuk container flex utama */
        .d-flex.h-100 {
            width: 100%;
            overflow: hidden;
        }

        /* Perbaiki sidebar dokter */
        .border-right {
            flex-shrink: 0;
            width: 280px;
        }

        /* Perbaiki area konten chat */
        .flex-grow-1 {
            min-width: 0; /* Tambahkan ini */
            overflow: hidden; /* Tambahkan ini */
        }
    </style>
</head>
<body>
    <div class="chat-app-container" style="height:100vh;">
        <!-- Header -->
        <header class="chat-header">
            <div class="container-fluid d-flex align-items-center justify-content-between py-2 px-3">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/logo_utama_kalisari.png') }}" alt="Logo" style="height:36px;" class="mr-2">
                    <span class="font-weight-bold text-primary" style="font-size:1.2rem;">Klinik Pratama</span>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="mb-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm d-flex align-items-center">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </button>
                </form>
            </div>
        </header>

        <!-- Main Chat Area -->
        <main class="chat-main" style="flex:1;min-height:0;">
            <div class="d-flex h-100">
                <!-- Doctor List Sidebar -->
                <div class="border-right" style="width: 280px; background: white;">
                    <div class="p-3">
                        <h6 class="font-weight-bold text-primary mb-3">Pilih Dokter</h6>
                        <div class="list-group list-group-flush">
                            @livewire('doctor-list')
                        </div>
                    </div>
                </div>

                <!-- Chat Content -->
                <div class="flex-grow-1">
                    <div class="flex-grow-1 d-flex flex-column chat-content-area" style="height:100%;">
                        @livewire('chat', ['userId' => request()->query('user_id')])
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('partials.javascripts')
    @livewireScripts
</body>
</html>
