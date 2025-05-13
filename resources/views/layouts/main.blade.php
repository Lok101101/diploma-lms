<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/main.styles.css') }}">k
    <title>@yield('title')</title>
</head>
<body>
<div x-data="{ mobileSidebarOpen: false }">
    <!-- Page Container -->
    <div
      id="page-container"
      class="mx-auto flex min-h-screen w-full min-w-[320px] flex-col bg-white lg:ps-64"
    >
      <!-- Page Sidebar -->
      <nav
        id="page-sidebar"
        class="fixed start-0 top-0 bottom-0 z-50 flex h-full w-80 flex-col overflow-auto bg-slate-100 transition-transform duration-500 ease-out lg:w-64 lg:ltr:translate-x-0 lg:rtl:translate-x-0"
        x-bind:class="{
      'ltr:-translate-x-full rtl:translate-x-full': !mobileSidebarOpen,
      'translate-x-0': mobileSidebarOpen,
    }"
        aria-label="Main Sidebar Navigation"
        x-cloak
      >
        <!-- Sidebar Header -->
        <div
          class="flex h-20 w-full flex-none items-center justify-between px-8"
        >
          <!-- Brand -->
          <a
            href="javascript:void(0)"
            class="inline-flex items-center gap-2 text-lg font-bold tracking-wide text-slate-800 transition hover:opacity-75 active:opacity-100"
          >
            <svg
              class="bi bi-window-sidebar inline-block size-4 text-blue-600"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 16 16"
            >
              <path
                d="M2.5 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm1 .5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"
              />
              <path
                d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v2H1V3a1 1 0 0 1 1-1h12zM1 13V6h4v8H2a1 1 0 0 1-1-1zm5 1V6h9v7a1 1 0 0 1-1 1H6z"
              />
            </svg>
            <span
              >tail<span class="font-medium text-blue-600">app</span></span
            >
          </a>
          <!-- END Brand -->

          <!-- Close Sidebar on Mobile -->
          <div class="lg:hidden">
            <button
              type="button"
              class="flex size-10 items-center justify-center text-slate-400 hover:text-slate-600 active:text-slate-400"
              x-on:click="mobileSidebarOpen = false"
            >
              <svg
                class="hi-solid hi-x -mx-1 inline-block size-5"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                />
              </svg>
            </button>
          </div>
          <!-- END Close Sidebar on Mobile -->
        </div>
        <!-- END Sidebar Header -->

        <!-- Main Navigation -->
        <div class="w-full grow space-y-3 p-4">
            @auth
          <a
            href="{{ route('getMyTests') }}"
            class="{{ request()->routeIs('getMyTests') ? 'current' : ''}} flex items-center gap-3 rounded-lg px-4 py-2.5 font-semibold text-slate-600 hover:bg-white hover:shadow-xs hover:shadow-slate-300/50 active:bg-white/75 active:text-slate-800 active:shadow-slate-300/10"
          >
            <svg
              class="bi bi-briefcase-fill inline-block size-4 text-slate-400"
              xmlns="http://www.w3.org/2000/svg"
              fill="#17b292"
              viewBox="0 0 16 16"
            >
              <path
                d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"
              />
              <path
                d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"
              />
            </svg>
            <span class="">Мои тесты</span>
            </a>
            @endauth
            <a
            href="{{ route('courses') }}"
            class="{{ request()->routeIs('courses') ? 'current' : ''}} flex items-center gap-3 rounded-lg px-4 py-2.5 font-semibold text-slate-600"
          >
            <svg
              class="bi bi-house-heart-fill inline-block size-5 text-slate-400"
              xmlns="http://www.w3.org/2000/svg"
              fill="#17b292"
              viewBox="0 0 16 16"
            >
              <path
                d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.707L8 2.207 1.354 8.853a.5.5 0 1 1-.708-.707L7.293 1.5Z"
              />
              <path
                d="m14 9.293-6-6-6 6V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9.293Zm-6-.811c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.691 0-5.018Z"
              />
            </svg>
            <span>Курсы</span>
          </a>
        </div>
        <!-- END Main Navigation -->

        <!-- Sub Navigation -->
        <div class="w-full flex-none space-y-3 p-4">
            @auth
            <a
            href="{{ route('logout') }}"
            class="flex items-center gap-3 rounded-lg px-4 py-2.5 font-semibold text-slate-600 hover:bg-white hover:shadow-xs hover:shadow-slate-300/50 active:bg-white/75 active:text-slate-800 active:shadow-slate-300/10">
                <svg
                    class="bi bi-box-arrow-right inline-block size-6 text-slate-400"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
                <span>Выйти</span>
            </a>
            @endauth
            @guest
            <a
            href="{{ route('login') }}"
            class="flex items-center gap-3 rounded-lg px-4 py-2.5 font-semibold text-slate-600 hover:bg-white hover:shadow-xs hover:shadow-slate-300/50 active:bg-white/75 active:text-slate-800 active:shadow-slate-300/10">
            <svg
                class="bi bi-door-open inline-block size-6 text-slate-400"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 16 16">
                <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
            </svg>
            <span>Войти</span>
            </a>
            <a
            href="{{ route('register') }}"
            class="flex items-center gap-3 rounded-lg px-4 py-2.5 font-semibold text-slate-600 hover:bg-white hover:shadow-xs hover:shadow-slate-300/50 active:bg-white/75 active:text-slate-800 active:shadow-slate-300/10">
            <svg
                class="bi bi-person-plus inline-block size-6 text-slate-400"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
            <span>Регистрация</span>
            </a>
            @endguest
        </div>
        <!-- END Sub Navigation -->
      </nav>
      <!-- Page Sidebar -->

      <!-- Page Header -->
      <header
        id="page-header"
        class="fixed start-0 end-0 top-0 z-30 flex h-20 flex-none items-center bg-white shadow-xs lg:hidden"
      >
        <div
          class="container mx-auto flex justify-between px-4 lg:px-8 xl:max-w-7xl"
        >
          <!-- Left Section -->
          <div class="flex items-center gap-2">
            <!-- Toggle Sidebar on Mobile -->
            <button
              type="button"
              class="inline-flex items-center justify-center gap-2 rounded-sm border border-slate-200 bg-white px-2 py-1.5 leading-6 font-semibold text-slate-800 shadow-xs hover:border-slate-300 hover:bg-slate-100 hover:text-slate-800 hover:shadow-sm focus:ring-3 focus:ring-slate-500/25 focus:outline-hidden active:border-white active:bg-white active:shadow-none"
              x-on:click="mobileSidebarOpen = true"
            >
              <svg
                class="hi-solid hi-menu-alt-1 inline-block size-5"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                />
              </svg>
            </button>
            <!-- END Toggle Sidebar on Mobile -->
          </div>
          <!-- END Left Section -->

          <!-- Middle Section -->
          <div class="flex items-center gap-2">
            <!-- Brand -->
            <a
              href="javascript:void(0)"
              class="inline-flex items-center gap-2 text-lg font-bold tracking-wide text-slate-800 transition hover:opacity-75 active:opacity-100"
            >
              <svg
                class="bi bi-window-sidebar inline-block size-4 text-blue-600"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 16 16"
              >
                <path
                  d="M2.5 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm1 .5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"
                />
                <path
                  d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v2H1V3a1 1 0 0 1 1-1h12zM1 13V6h4v8H2a1 1 0 0 1-1-1zm5 1V6h9v7a1 1 0 0 1-1 1H6z"
                />
              </svg>
              <span
                >tail<span class="font-medium text-blue-600">app</span></span
              >
            </a>
            <!-- END Brand -->
          </div>
          <!-- END Middle Section -->

          <!-- Right Section -->
          <div class="flex items-center gap-2">
            <!-- Settings -->
            <a
              href="javascript:void(0)"
              class="inline-flex items-center justify-center gap-2 rounded-sm border border-slate-200 bg-white px-2 py-1.5 leading-6 font-semibold text-slate-800 shadow-xs hover:border-slate-300 hover:bg-slate-100 hover:text-slate-800 hover:shadow-sm focus:ring-3 focus:ring-slate-500/25 focus:outline-hidden active:border-white active:bg-white active:shadow-none"
            >
              <svg
                class="hi-solid hi-user-circle inline-block size-5"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                  clip-rule="evenodd"
                />
              </svg>
            </a>
            <!-- END Toggle Sidebar on Mobile -->
          </div>
          <!-- END Right Section -->
        </div>
      </header>
      <!-- END Page Header -->

      <!-- Page Content -->
      <main
        id="page-content"
        class="flex max-w-full flex-auto flex-col pt-20 lg:pt-0"
      >
        <!-- Page Section -->
        <div
          class="container mx-auto space-y-10 px-4 py-8 lg:space-y-16 lg:px-8 lg:py-12 xl:max-w-7xl"
        >
            @yield('content')
        </div>
        <!-- END Page Section -->
      </main>
      <!-- END Page Content -->

      <!-- Page Footer -->
      <footer
        id="page-footer"
        class="flex grow-0 items-center border-t border-slate-100"
      >
        <div
          class="container mx-auto flex flex-col gap-2 px-4 py-6 text-center text-sm font-medium text-slate-600 md:flex-row md:justify-between md:gap-0 md:text-start lg:px-8 xl:max-w-7xl"
        >
          <div>© <span class="font-semibold">tailapp</span></div>
          <div class="inline-flex items-center justify-center">
            <span>Crafted with</span
            ><svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
              fill="currentColor"
              aria-hidden="true"
              class="mx-1 size-4 text-red-600"
            >
              <path
                d="M9.653 16.915l-.005-.003-.019-.01a20.759 20.759 0 01-1.162-.682 22.045 22.045 0 01-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 018-2.828A4.5 4.5 0 0118 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 01-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 01-.69.001l-.002-.001z"
              ></path>
            </svg>
            <span
              >by
              <a
                class="font-medium text-blue-600 transition hover:text-blue-700"
                href="https://pixelcave.com"
                target="_blank"
                >pixelcave</a
              ></span
            >
          </div>
        </div>
      </footer>
      <!-- END Page Footer -->
    </div>
    <!-- END Page Container -->
  </div>
</body>
</html>
