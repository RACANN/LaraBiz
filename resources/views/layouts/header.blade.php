
<nav class="navbar is-transparent">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
    </a>
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="/manager">
        Home
      </a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="{{route('employees.all')}}">
          Employees
        </a>
        <div class="navbar-dropdown is-boxed">
          <a class="navbar-item" href="{{route('employees.all')}}">
            All
          </a>
          <a class="navbar-item" href="{{route('employees.new')}}">
            New
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="{{route('shifts.all')}}">
          Shifts
        </a>
        <div class="navbar-dropdown is-boxed">
          <a class="navbar-item" href="{{route('shifts.all')}}">
            All
          </a>
          <a class="navbar-item" href="{{route('shifts.new')}}">
            New
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="{{route('products.all')}}">
          Products
        </a>
        <div class="navbar-dropdown is-boxed">
          <a class="navbar-item" href="{{route('products.all')}}">
            All
          </a>
          <a class="navbar-item" href="{{route('products.new')}}">
            New
          </a>
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="field is-grouped">
          <p class="control">
            <a class="bd-tw-button button" data-social-network="Twitter" data-social-action="tweet" data-social-target="http://localhost:4000" target="_blank" href="https://twitter.com/intent/tweet?text=Bulma: a modern CSS framework based on Flexbox&amp;hashtags=bulmaio&amp;url=http://localhost:4000&amp;via=jgthms">
              <span class="icon">
                <i class="fab fa-twitter"></i>
              </span>
              <span>
                Tweet
              </span>
            </a>
          </p>
          <p class="control">
            <a class="button is-primary" href="https://github.com/jgthms/bulma/releases/download/0.7.1/bulma-0.7.1.zip">
              <span class="icon">
                <i class="fas fa-download"></i>
              </span>
              <span>Download</span>
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</nav>






{{--Old Nav Start--}}

<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="/manager">
     Home
    </a>

    <a  class="navbar-item" href="/employees/">Employees</a>
    <a  class="navbar-item" href="/shifts">Shifts</a>
    <a  class="navbar-item" href="#">Orders</a>
    <a  class="navbar-item" href="/products">Inventory</a>
    <a  class="navbar-item" href="/schedules">Schedules</a>

    <div class="navbar-burger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</nav>

{{--old nav end--}}