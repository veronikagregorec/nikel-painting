<?php
/*Template Name: Kontakt Template*/
?>

<?php get_header(); ?>

<div class="header-kontakt">

</div>

    <div class="vsebina">
        <div class="main2">
            <div class="contact">
                <div class="info">

                    <?php get_template_part('includes/section', 'content'); ?>

                </div>

                <div class="form">

                    <h1>Pošljite povpraševanje</h1>

                    <form id="enquiry" class="obrazec" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="off">
                        <input type="text" name="names" placeholder="Ime in priimek" class="imepriimek" required>
                        <input type="email" name="emails" placeholder="E-pošta" class="e-posta" required>
                        <input type="text" name="subjects" placeholder="Zadeva" class="zadeva" required>
                        <textarea class="textarea-povprasevanje" name="messages"  placeholder="Sporočilo" spellcheck="false" required></textarea>
                        <div id="alert"></div>
                        <button type="submit">Pošlji</button>
                    </form>

                    <div id="notsent" style="display:none"></div>
                    <div id="sent" style="display:none"></div>
            
                </div>

                <script>
                    (function($){
                        $('#enquiry').submit(function(event){

                            event.preventDefault();
                            $('#alert').text('Pošiljam...').fadeIn(0);
                            var endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';
                            var form = $('#enquiry').serialize();

                            var formdata = new FormData;
                            formdata.append('action', 'enquiry'); 
                            formdata.append('nonce', '<?php echo wp_create_nonce('ajax-nonce'); ?>');
                            formdata.append('enquiry', form);

                            $.ajax(endpoint, {
                                
                                type:'POST',
                                data:formdata,
                                processData:false,  
                                contentType:false, 

                                success:function(res){
                                    $('#sent').text('Sporočilo poslano').show();
                                    $('#enquiry').trigger('reset');
                                    $('#alert').text('Pošiljam...').fadeIn(200).hide();
                                },

                                error:function(err){
                                    $('#notsent').text('Sporočilo ni bilo poslano').show();
                                    $('#alert').text('Pošiljam....').fadeIn(200).hide();
                                    alert(err.responseJSON.data);
                                }
                            })
                        })
                    })(jQuery)
                </script>
            </div>
            <script>
                jQuery(document).ready(function(){
                    jQuery('#enquiry').bind("cut copy paste",function(e) {
                    e.preventDefault();
                        });
                    });
            </script>

            
        </div>
    </div>
    <div class="map">

        <div class="mapouter">

            <div class="gmap_canvas"><iframe id="gmap_canvas"
                    src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0" loading="lazy">
                </iframe>
            </div>

        </div>

    </div>

<?php get_footer(); ?>