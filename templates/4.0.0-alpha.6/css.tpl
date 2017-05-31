.navbar {
  background-color: {{bgDefault}};
}
.navbar .navbar-brand {
  color: {{colDefault}};
}
.navbar .navbar-brand:hover,
.navbar .navbar-brand:focus {
  color: {{colHighlight}};
}
.navbar .navbar-text {
  color: {{colDefault}};
}
.navbar .navbar-nav .nav-link {
  color: {{colDefault}};
  border-radius: .25rem;
  margin: 0 0.25em;
}
.navbar .navbar-nav .nav-link:not(.disabled):hover,
.navbar .navbar-nav .nav-link:not(.disabled):focus {
  color: {{colHighlight}};
}
{{dropDown}}.navbar .navbar-nav .dropdown-menu {
{{dropDown}}  background-color: {{bgDefault}};
{{dropDown}}  border-color: {{bgHighlight}};
{{dropDown}}}
{{dropDown}}.navbar .navbar-nav .dropdown-menu .dropdown-item {
{{dropDown}}  color: {{colDefault}};
{{dropDown}}}
{{dropDown}}.navbar .navbar-nav .dropdown-menu .dropdown-item:hover,
{{dropDown}}.navbar .navbar-nav .dropdown-menu .dropdown-item:focus,
{{dropDown}}.navbar .navbar-nav .dropdown-menu .dropdown-item.active {
{{dropDown}}  color: {{colHighlight}};
{{dropDown}}  background-color: {{bgHighlight}};
{{dropDown}}}
{{dropDown}}.navbar .navbar-nav .dropdown-menu .dropdown-divider {
{{dropDown}}  background-color: {{bgHighlight}};
{{dropDown}}}
.navbar .navbar-nav .nav-item.active .nav-link,
.navbar .navbar-nav .nav-item.active .nav-link:hover,
.navbar .navbar-nav .nav-item.active .nav-link:focus,
.navbar .navbar-nav .nav-item.show .nav-link,
.navbar .navbar-nav .nav-item.show .nav-link:hover,
.navbar .navbar-nav .nav-item.show .nav-link:focus {
  color: {{colHighlight}};
  background-color: {{bgHighlight}};
}
.navbar .navbar-toggle {
  border-color: {{bgHighlight}};
}
.navbar .navbar-toggle:hover,
.navbar .navbar-toggle:focus {
  background-color: {{bgHighlight}};
}
.navbar .navbar-toggle .navbar-toggler-icon {
  color: {{colDefault}};
}
.navbar .navbar-collapse,
.navbar .navbar-form {
  border-color: {{colDefault}};
}
.navbar .navbar-link {
  color: {{colDefault}};
}
.navbar .navbar-link:hover {
  color: {{colHighlight}};
}

@media (max-width: 767px) {
  .navbar .navbar-nav .open .dropdown-menu .dropdown-item {
    color: {{colDefault}};
  }
  .navbar .navbar-nav .open .dropdown-menu .dropdown-item:hover,
  .navbar .navbar-nav .open .dropdown-menu .dropdown-item:focus {
    color: {{colHighlight}};
  }
  .navbar .navbar-nav .open .dropdown-menu .dropdown-item.active {
    color: {{colHighlight}};
    background-color: {{bgHighlight}};
  }
}