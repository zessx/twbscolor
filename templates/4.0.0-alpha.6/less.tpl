@bgDefault      : {{bgDefault}};
@bgHighlight    : {{bgHighlight}};
@colDefault     : {{colDefault}};
@colHighlight   : {{colHighlight}};
@dropDown       : {{dropDown}};
.ddm() when (@dropDown) {
  .dropdown-menu {
    background-color: @bgDefault;
    border-color: @bgHighlight;
    .dropdown-item {
      color: @colDefault;
      &:hover, &:focus, &.active {
        color: @colHighlight;
        background-color: @bgHighlight; }}
    .dropdown-divider {
      background-color: @bgHighlight;}}}
.navbar {
  background-color: @bgDefault;
  .navbar-brand {
    color: @colDefault;
    &:hover, &:focus {
      color: @colHighlight; }}
  .navbar-text {
    color: @colDefault; }
  .navbar-nav {
    .nav-link {
      color: @colDefault;
      border-radius: .25rem;
      margin: 0 0.25em;
      &:not(.disabled) {
        &:hover,  &:focus {
          color: @colHighlight; }}}
    .ddm;
    .nav-item.active, .nav-item.show {
      .nav-link, .nav-link:hover, .nav-link:focus {
        color: @colHighlight;
        background-color: @bgHighlight; }}}
  .navbar-toggle {
    border-color: @bgHighlight;
    &:hover, &:focus {
      background-color: @bgHighlight; }
    .navbar-toggler-icon {
      color: @colDefault; }}
  .navbar-collapse,
  .navbar-form {
    border-color: @colDefault; }
  .navbar-link {
    color: @colDefault;
    &:hover {
      color: @colHighlight; }}}
@media (max-width: 767px) {
  .navbar .navbar-nav .open .dropdown-menu {
    .dropdown-item {
      color: @colDefault;
      &:hover, &:focus {
        color: @colHighlight; }}
    .dropdown-item.active {
      color: @colHighlight;
      background-color: @bgHighlight; }}
}