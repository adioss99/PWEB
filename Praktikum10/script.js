let index = 0;

function show(index) {
  $.get(`model.php?page=${index}`, function (response) {
    response = JSON.parse(response);
    response.forEach((item) => {
      $('#content').append(
        '<div class="col-xl-3 col-md-6 col-sm-12">'+
            '<div class="card"> '+
                '<img src="style/samuel-regan-asante-wMkaMXTJjlQ-unsplash.jpg" class="card-img"> '+
                '<div class="card-body m-1">'+
                    '<h5 class="card-title">'+
                        item.title+
                    '</h5>'+
                    '<div class="card-subtitle">'+
                        '<div class="row">'+
                            '<div class="col-lg-7">'+
                                'Rating:'+ item.rating+
                            '</div>'+
                            '<div class="col-lg-5 text-end">'+
                                '<button type="button" class="btn btn-sm btn-primary"><i class="fa-regular fa-pen-to-square"></i></button>'+
                                '<button type="button" class="btn btn-sm btn-danger"><i class="fa-regular fa-trash-can"></i></button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>'
      );
    });
  });
}

$('#load-movie').click(function () {
  index = index + 12;
  show(index);
});

$(document).ready(function () {
  show(index);
});