<h3>{{ __('admin::app.settings.footer.icon-theme') }}</h3>

<div class="wrap-control">
    <div style="margin-right: -23%;" class="control-group">
        <div class="control-group  container">
            <label class="container list-heading">{{ __('shop::app.footer.icon-theme.default') }}
                <input type="radio" name="radio" {{App\SocialIcon::skip(1)->take(1)->get(['icon_name'])[0]->icon_name == 'default_icon_theme' ? 'checked' : '' }} value="{{'default_icon_theme / Instagram  <span><i class="fab fa-instagram fa-1x" style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;"></i></span> / Twitter  <span><i style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;" class="fab fa-twitter fa-1x"></i></span> / Facebook  <span><i class="fab fa-facebook-f fa-1x" style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;"></i></span> / Youtube  <span><i class="fab fa-youtube fa-1x" style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;"></i></span> / Whatsapp  <span><i style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;" class="fab fa-whatsapp"></i></span>'}}">
                <span class="checkmark"></span>
            </label>
        </div>
        <div id="first_name">
            <span><i class="fab fa-instagram fa-1x" style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;"></i></span>
            <span><i style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;" class="fab fa-twitter fa-1x"></i>
</span>
            <span><i class="fab fa-facebook-f fa-1x" style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;"></i></span>
            <span><i class="fab fa-youtube fa-1x" style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;"></i></span>
            <span><i style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;" class="fab fa-whatsapp"></i></span>
        </div>
    </div>

    <div class="control-group">
        <div class="control-group container">
            <label class="container list-heading"> {{ __('shop::app.footer.icon-theme.cute') }}
                <input type="radio" name="radio" {{App\SocialIcon::skip(1)->take(1)->get(['icon_name'])[0]->icon_name == 'cute_icon_theme' ? 'checked' : '' }} value="{{'cute_icon_theme / Instagram  <span><i class="fab fa-instagram fa-1x" style="font-size: 1.5em; color: rgb(240, 58, 91); margin-right: 15px;"></i></span> / Twitter  <span><i style="font-size: 1.5em; color: rgb(29, 161, 242); margin-right: 15px;" class="fab fa-twitter fa-1x"></i></span> / Facebook  <span><i class="fab fa-facebook-f fa-1x" style="font-size: 1.5em; color: rgb(59, 89, 152); margin-right: 15px;"></i></span> / Youtube  <span><i class="fab fa-youtube fa-1x" style="font-size: 1.5em; color: rgb(255, 0, 0); margin-right: 15px;"></i></span> / Whatsapp  <span><i style="font-size: 1.5em; color: rgb(37, 211, 102); margin-right: 15px;" class="fab fa-whatsapp"></i></span>'}}">
                <span class="checkmark"></span>
            </label>
        </div>
        <span><i class="fab fa-instagram fa-1x" style="font-size: 1.5em; color: rgb(240, 58, 91); margin-right: 15px;"></i></span>
        <span><i style="font-size: 1.5em; color: rgb(29, 161, 242); margin-right: 15px;" class="fab fa-twitter fa-1x"></i>
</span>
        <span><i class="fab fa-facebook-f fa-1x" style="font-size: 1.5em; color: rgb(59, 89, 152); margin-right: 15px;"></i></span>
        <span><i class="fab fa-youtube fa-1x" style="font-size: 1.5em; color: rgb(255, 0, 0); margin-right: 15px;"></i></span>
        <span><i style="font-size: 1.5em; color: rgb(37, 211, 102); margin-right: 15px;" class="fab fa-whatsapp"></i></span>
    </div>
</div>

<div class="wrap-control">
    <div style="margin-right: -23%;" class="control-group">
        <div class="control-group container">
            <label class="container list-heading"> {{ __('shop::app.footer.icon-theme.square') }}
                <input type="radio" name="radio" {{App\SocialIcon::skip(1)->take(1)->get(['icon_name'])[0]->icon_name == 'square_icon_theme' ? 'checked' : '' }} value="{{'square_icon_theme / Instagram  <span><i class="fab fa-instagram fa-1x" style="font-size: 1.5em; color: rgb(240, 58, 91); margin-right: 15px;"></i></span> / Twitter  <span><i style="font-size: 1.5em; color: rgb(29, 161, 242); margin-right: 15px;" class="fab fa-twitter-square fa-1x"></i></span> / Facebook  <span><i class="fab fa-facebook-square fa-1x" style="font-size: 1.5em; color: rgb(59, 89, 152); margin-right: 15px;"></i></span> / Youtube  <span><i class="fab fa-youtube-square fa-1x" style="font-size: 1.5em; color: rgb(255, 0, 0); margin-right: 15px;"></i></span> / Whatsapp  <span><i style="font-size: 1.5em; background: rgb(37, 211, 102); color: #ffffff; margin-right: 15px;" class="fab fa-whatsapp"></i></span>'}}">
                <span class="checkmark"></span>
            </label>
        </div>
        <div id="first_name">
            <span><i class="fab fa-instagram fa-1x" style="font-size: 1.5em; color: rgb(240, 58, 91); margin-right: 15px;"></i></span>
            <span><i style="font-size: 1.5em; color: rgb(29, 161, 242); margin-right: 15px;" class="fab fa-twitter-square fa-1x"></i>
</span>
            <span><i class="fab fa-facebook-square fa-1x" style="font-size: 1.5em; color: rgb(59, 89, 152); margin-right: 15px;"></i></span>
            <span><i class="fab fa-youtube-square fa-1x" style="font-size: 1.5em; color: rgb(255, 0, 0); margin-right: 15px;"></i></span>
            <span><i style="font-size: 1.5em; background: rgb(37, 211, 102); color: #ffffff; margin-right: 15px;" class="fab fa-whatsapp"></i></span>

        </div>
    </div>

    <div class="control-group">
        <div class="control-group container">
            <label class="container list-heading"> {{ __('shop::app.footer.icon-theme.flat') }}
                <input type="radio" name="radio" {{App\SocialIcon::skip(1)->take(1)->get(['icon_name'])[0]->icon_name == 'flat_icon_theme' ? 'checked' : '' }} value="{{'flat_icon_theme / Instagram  <span><i class="fab fa-instagram fa-1x" style="font-size: 1.5em; color: rgb(240, 58, 91); margin-right: 15px;"></i></span> / Twitter  <span><i style="font-size: 1.5em; color: rgb(29, 161, 242); margin-right: 15px;" class="fab fa-twitter fa-1x"></i></span> / Facebook  <span><i class="fab fa-facebook-f fa-1x" style="font-size: 1.5em; color: rgb(59, 89, 152); margin-right: 15px;"></i></span> / Youtube  <span><i class="fab fa-youtube fa-1x" style="font-size: 1.5em; color: rgb(255, 0, 0); margin-right: 15px;"></i></span> / Whatsapp  <span><i style="font-size: 1.5em; color: rgb(37, 211, 102); margin-right: 15px;" class="fab fa-whatsapp"></i></span>'}}">
                <span class="checkmark"></span>
            </label>
        </div>

        <span><i class="fab fa-instagram fa-1x" style="font-size: 1.5em; color: rgb(240, 58, 91); margin-right: 15px;"></i></span>
        <span><i style="font-size: 1.5em; color: rgb(29, 161, 242); margin-right: 15px;" class="fab fa-twitter fa-1x"></i>
</span>
        <span><i class="fab fa-facebook-f fa-1x" style="font-size: 1.5em; color: rgb(59, 89, 152); margin-right: 15px;"></i></span>
        <span><i class="fab fa-youtube fa-1x" style="font-size: 1.5em; color: rgb(255, 0, 0); margin-right: 15px;"></i></span>
        <span><i style="font-size: 1.5em; color: rgb(37, 211, 102); margin-right: 15px;" class="fab fa-whatsapp"></i></span>

    </div>
</div>
