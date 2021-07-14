@extends('layouts.front')

@section('content')

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Checkout example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{asset('assets/img/indice2.png')}}" alt="" width="180" height="180">
        <h2>Tela De Pagamento</h2>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Seu carrinho</span>
            <span class="badge badge-secondary badge-pill">{{count(session()->get('cart'))}}</span>
          </h4>

                @php
                $total = 0;
                @endphp
                @foreach($cart as $c)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <small class="text-muted">{{$c['amount']}}</small>
                    <h6 class="my-0">{{$c['name']}}</h6>
                    <span class="text-muted">R${{number_format($c['price'],2,',','.')}}</span>
                    </li>
                    
                @php
                    $subtotal = $c['price'] * $c['amount'];
                    $total += $subtotal;
                @endphp
                @endforeach

            <li class="list-group-item d-flex justify-content-between">
              <span>Total (R$)</span>
              <strong>R${{number_format($total,2,',','.')}}</strong>
            </li>
          </ul>
    
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Endereço</h4>
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Primeiro Nome</label>
                <input type="text" class="form-control" id="firstName" placeholder="Victor" value="" required>
                <div class="invalid-feedback">
                  Este Campo é Obrigatorio.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Segundo name</label>
                <input type="text" class="form-control" id="lastName" placeholder="Diego" value="" required>
                <div class="invalid-feedback">
                    Este Campo é Obrigatorio
                </div>
              </div>
            </div>


            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Recomendado)</span></label>
              <input type="email" class="form-control" id="email" placeholder="email@email.com">
              <div class="invalid-feedback">
                Por favor Coloque Um Email Valido.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Rua</label>
              <input type="text" class="form-control" id="address" placeholder="Rua Exemplo exemplo" required>
              <div class="invalid-feedback">
                Por Favor Coloque Sua Rua.
              </div>
            </div>

            <div class="mb-3">
                <label for="number">Numero Da Casa</label>
                <input type="text" class="form-control" id="number" placeholder="1111" required>
                <div class="invalid-feedback">
                  Por Favor Coloque o Numero Da Casa.
                </div>
              </div>

              <div class="mb-3">
                <label for="zip">CEP</label>
                <input type="text" class="form-control" id="zip" placeholder="18876-888" required>
                <div class="invalid-feedback">
                  Cep Obrigatorio.
                </div>
            </div>
            <div class="mb-3">
                <label for="state">Estado</label>
                <input type="text" class="form-control" id="address" placeholder="São Paulo" required>
                <div class="invalid-feedback">
                  Por Favor Coloque seu Estado.
                </div>
              </div>
              <div class="mb-3">
                <label for="city">Cidade</label>
                <input type="text" class="form-control" id="city" placeholder="Sorocaba" required>
                <div class="invalid-feedback">
                  Por Favor Coloque sua Cidade.
                </div>
              </div>

            <h4 class="mb-3">Pagamento</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Cartão De Credito</label>
                <hr>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Nome</label>
                <input type="text" class="form-control" id="cc-name" placeholder="joao pedro g oliveira" required>
                <small class="text-muted">Nome Completo Igual Ao Cartão</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Numero Do Cartão De Credito</label>
                <input type="text" class="form-control" id="cc-number" placeholder="4484884844554548..." required>
                <div class="invalid-feedback">
                  Numero Do Cartão Obrigatorio
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2 mb-3">
                <label for="cc-expiration">Mês De Expiração</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="05" required>
                <div class="invalid-feedback">
                  Campo Obrigatorio
                </div>
              </div>
                <div class="col-md-2 mb-3">
                  <label for="cc-expiration">Ano De expiração</label>
                  <input type="text" class="form-control" id="cc-expiration" placeholder="2025" required>
                  <div class="invalid-feedback">
                    Campo Obrigatorio
                  </div>
                </div>
            
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV - Codigo De Segurança</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="000" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
            </div>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Concluir Pagamento</button>
          </form>
          <img class="d-block mx-auto mb-4" src="{{asset('assets/img/seguro2.png')}}" alt="" width="650" height="180">
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2021 Pulseiras Da Viih</p>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>

@endsection