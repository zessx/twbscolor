.navbar-default {
  background-color: {{bgDefault}};
  border-color: {{bgHighlight}};
}
.navbar-default .navbar-brand {
  color: {{colDefault}};
}
.navbar-default .navbar-brand:hover,
.navbar-default .navbar-brand:focus {
  color: {{colHighlight}};
}
.navbar-default .navbar-text {
  color: {{colDefault}};
}
.navbar-default .navbar-nav > li > a {
  color: {{colDefault}};
}
.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
  color: {{colHighlight}};
}
{{dropDown}}.navbar-default .navbar-nav > li > .dropdown-menu {
{{dropDown}}  background-color: {{bgDefault}};
{{dropDown}}}
{{dropDown}}.navbar-default .navbar-nav > li > .dropdown-menu > li > a {
{{dropDown}}  color: {{colDefault}};
{{dropDown}}}
{{dropDown}}.navbar-default .navbar-nav > li > .dropdown-menu > li > a:hover,
{{dropDown}}.navbar-default .navbar-nav > li > .dropdown-menu > li > a:focus {
{{dropDown}}  color: {{colHighlight}};
{{dropDown}}  background-color: {{bgHighlight}};
{{dropDown}}}
{{dropDown}}.navbar-default .navbar-nav > li > .dropdown-menu > li.divider {
{{dropDown}}  background-color: {{bgHighlight}};
{{dropDown}}}
{{dropDown}}.navbar-default .navbar-nav .open .dropdown-menu > .active > a,
{{dropDown}}.navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
{{dropDown}}.navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
{{dropDown}}  color: {{colHighlight}};
{{dropDown}}  background-color: {{bgHighlight}};
{{dropDown}}}
.navbar-default .navbar-nav > .active > a,
.navbar-default .navbar-nav > .active > a:hover,
.navbar-default .navbar-nav > .active > a:focus {
  color: {{colHighlight}};
  background-color: {{bgHighlight}};
}
.navbar-default .navbar-nav > .open > a,
.navbar-default .navbar-nav > .open > a:hover,
.navbar-default .navbar-nav > .open > a:focus {
  color: {{colHighlight}};
  background-color: {{bgHighlight}};
}
.navbar-default .navbar-toggle {
  border-color: {{bgHighlight}};
}
.navbar-default .navbar-toggle:hover,
.navbar-default .navbar-toggle:focus {
  background-color: {{bgHighlight}};
}
.navbar-default .navbar-toggle .icon-bar {
  background-color: {{colDefault}};
}
.navbar-default .navbar-collapse,
.navbar-default .navbar-form {
  border-color: {{colDefault}};
}
.navbar-default .navbar-link {
  color: {{colDefault}};
}
.navbar-default .navbar-link:hover {
  color: {{colHighlight}};
}

@media (max-width: 767px) {
  .navbar-default .navbar-nav .open .dropdown-menu > li > a {
    color: {{colDefault}};
  }
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
    color: {{colHighlight}};
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: {{colHighlight}};
    background-color: {{bgHighlight}};
  }
}