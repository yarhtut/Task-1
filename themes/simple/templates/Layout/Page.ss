
<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">

    $Form
    <article>
        <h1>$Title</h1>
        <div class="content">$Content</div>





        <% loop $ViewableData %>

            <div class="col-lg-4 col-md-4 col-sm-6">

                <div class="card hovercard">
                    <img class="cardheader" src="$img" />
                    <div class="avatar">
                        <img alt="" src="$img">
                    </div>
                    <div class="info">
                        <div class="title">
                            <a>$title: $firstname $surname </a>
                        </div>
                        <div class="desc">$email</div>
                        <div class="desc">$gender</div>


                    </div>
                </div>

            </div>
        <% end_loop %>



        <article>



</div>
