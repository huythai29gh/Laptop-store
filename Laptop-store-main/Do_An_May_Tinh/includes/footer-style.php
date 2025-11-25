<?php
/**
 * Footer Styles
 * CSS dành cho component footer
 */
?>
<style>
#footer {
  background: #0a0a0a;
  padding: 50px 0 30px;
}
.section {
  padding-top: 30px;
  padding-bottom: 30px;
}
#bottom-footer {
  background: #0a0a0a;  
  border-top: 1px solid #333;
  padding: 30px 0;
}
section {
  display: block;
}
.container {
  width: 100%;
  padding-right: 50px;
  padding-left: 50px;
  margin-right: auto;
  margin-left: auto;
}
@media (min-width: 576px) {
  .container {
    max-width: 540px;
  }
}
@media (min-width: 768px) {
  .container {
    max-width: 720px;
  }
}
@media (min-width: 992px) {
  .container {
    max-width: 960px;
  }
}

@media (min-width: 1200px) {
  .container {
    max-width: 1140px;
  }
}
.footer {
  padding: 0 20px;
}

.row .col-md-3 {
  padding: 0 30px;
}

.footer .footer-title {
  color: #fff;
  text-transform: uppercase;
  font-size: 16px;
  font-weight: 700;
  letter-spacing: 1px;
  margin: 0 0 25px;
  padding-bottom: 15px;
  border-bottom: 2px solid #d10024;
  display: inline-block;
}

.footer-links {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-links li {
  margin-bottom: 12px;
}

.footer-links li + li {
  margin-top: 12px;
}

.footer-links li a {
  color: #e6e6fa;
  text-decoration: none;
  font-size: 14px;
  transition: 0.3s ease;
  display: flex;
  align-items: center;
}

.footer-links li a:hover {
  color: #d10024;
  transform: translateX(5px);
}

.footer-links li i {
  margin-right: 12px;
  color: #d10024;
  width: 16px;
  text-align: center;
  font-size: 14px;
}
.row {
    margin-right: -15px;
    margin-left: -15px;
}
.row {
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px;
}
@media only screen and (max-width: 480px) {
  [class*="col-xs"] {
    width: 100%;
  }
  .store-grid {
    float: none;
    margin-top: 10px;
  }
  .store-pagination {
    float: none;
    margin-top: 10px;
  }
}
</style>    