  <!-- BEGIN: Footer For Desktop and tab -->
      <footer class="md:block hidden" id="footer">
        <div class="site-footer px-6 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-300 py-4 ltr:ml-[248px] rtl:mr-[248px]">
          <div class="grid md:grid-cols-2 grid-cols-1 md:gap-5">
            <div class="text-center ltr:md:text-start rtl:md:text-right text-sm">
              COPYRIGHT ©
              <span id="thisYear"></span>
              {{ config('app.name') }}, All rights Reserved
            </div>
            <div class="ltr:md:text-right rtl:md:text-end text-center text-sm">
              Developh By
              <a href="#" target="_blank" class="text-primary-500 font-semibold">
                Admin
              </a>
            </div>
          </div>
        </div>
      </footer>

    </div>
  </main>
  <!-- scripts -->
  <script src="{{url('assets/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{url('assets/js/rt-plugins.js')}}"></script>
  <script src="{{url('assets/js/app.js')}}"></script>
  
        <script src="{{url('assets/plugins/notifications/js/lobibox.min.js')}}"></script>
        <script src="{{url('assets/plugins/notifications/js/notifications.min.js')}}"></script>   

        <script>
            @if (Session::has('success'))
                Lobibox.notify('success', {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    icon: 'bi bi-bookmark-check-fill',
                    msg: "{{ Session::get('success')}}"
                });
            @endif
        </script>
        <script>
            @if ($message = Session::get('error'))
            Lobibox.notify('error', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                icon: 'bi bi-bookmark-x',
                msg: "{{ Session::get('error')}}"
            });			
            @endif
        </script>    
  
</body>
</html>