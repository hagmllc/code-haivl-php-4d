		<div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">
                
					<div class="side-col" id="page:left">
    					<h3>Cài Đặt</h3>
						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="settings_general.php" id="isoft_group_1" name="group_1" title="Cài Đặt Chung" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Cài Đặt Chung
                                    </span>
        						</a>
                                
        						<div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Cài Đặt Chung</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Tên Website </label></td>
                                                        <td class="value">
                                                        	<input id="site_name" name="site_name" value="{$site_name}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TÊN WEBSITE CỦA BẠN]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="contact_email">E-Mail Liên Hệ </label></td>
                                                        <td class="value">
                                                        	<input id="contact_email" name="contact_email" value="{$contact_email}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[ĐỊA CHỈ E-MAIL DÙNG ĐỂ NHẬN THƯ CỦA NGƯỜI LIÊN HỆ]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">E-Mail Website </label></td>
                                                        <td class="value">
                                                            <input id="site_email" name="site_email" value="{$site_email}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[ĐỊA CHỈ E-MAIL DÙNG ĐỂ GỬI THƯ ĐI]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Số Bài/Trang </label></td>
                                                        <td class="value">
                                                            <input id="items_per_page" name="items_per_page" value="{$items_per_page}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ BÀI ĐĂNG HIỂN THỊ TRÊN MỘT TRANG]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Giới Hạn Đăng </label></td>
                                                        <td class="value">
                                                            <input id="quota" name="quota" value="{$quota}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ BÀI THÀNH VIÊN CÓ THỂ ĐĂNG TRONG MỘT NGÀY]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Xác nhận bài dăng </label></td>
                                                        <td class="value">
                                                            <select id="approve_stories" name="approve_stories" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $approve_stories eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $approve_stories eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[YÊU CẦU BÀI MỚI PHẢI ĐƯỢC DUYỆT TRƯỚC KHI HIỂN THỊ CÔNG KHAI]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Điều Kiện Chấp Thuận </label></td>
                                                        <td class="value">
                                                            <input id="myes" name="myes" value="{$myes}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ BÌNH CHỌN CẦN ĐẠT ĐƯỢC TRƯỚC KHI BÀI ĐĂNG ĐƯỢC CHUYỂN TỪ TRANG BÌNH CHỌN SANG TRANG BÀI MỚI]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Điều Kiện Xóa </label></td>
                                                        <td class="value">
                                                            <input id="mno" name="mno" value="{$mno}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ BÌNH CHỌN "KHÔNG" CẦN ĐẠT ĐƯỢC TRƯỚC KHI BÀI ĐĂNG BỊ XÓA VĨNH VIỄN KHỎI TRANG BÌNH CHỌN VÀ TRANG BÀI MỚI]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="mtrend">Bài Đăng Hot </label></td>
                                                        <td class="value">
                                                            <input id="mtrend" name="mtrend" value="{$mtrend}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ BÌNH CHỌN CẦN ĐẠT ĐƯỢC TRƯỚC KHI BÀI ĐĂNG ĐƯỢC CHUYỂN TỪ TRANG BÀI MỚI SANG TRANG ĐANG HOT]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Tài Khoản Twitter </label></td>
                                                        <td class="value">
                                                            <input id="twitter" name="twitter" value="{$twitter}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TÀI KHOẢN TWITTER ĐƯỢC LIÊN KẾT KHI NGƯỜI DÙNG CHIA SẺ BÀI ĐĂNG LÊN TWITTER]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">ID Ứng Dụng Facebook </label></td>
                                                        <td class="value">
                                                            <input id="FACEBOOK_APP_ID" name="FACEBOOK_APP_ID" value="{$FACEBOOK_APP_ID}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[ID ỨNG DỤNG FACEBOOK NHẬN ĐƯỢC KHI BẠN TẠO ỨNG DỤNG TRÊN FACEBOOK]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Mã Ứng Dụng Facebook </label></td>
                                                        <td class="value">
                                                            <input id="FACEBOOK_SECRET" name="FACEBOOK_SECRET" value="{$FACEBOOK_SECRET}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[MÃ ỨNG DỤNG FACEBOOK NHẬN ĐƯỢC KHI BẠN TẠO ỨNG DỤNG TRÊN FACEBOOK]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="FACEBOOK_PROFILE">Trang Facebook </label></td>
                                                        <td class="value">
                                                            <input id="FACEBOOK_PROFILE" name="FACEBOOK_PROFILE" value="{$FACEBOOK_PROFILE}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TẠO MỘT TRANG FACEBOOK SAU ĐÓ ĐIỀN TÊN TRANG VÀO ĐÂY, VÍ DỤ TRANG FACEBOOK LÀ http://www.facebook.com/trollcackieu THÌ BẠN NHẬP VÀO LÀ trollcackieu]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="FACEBOOK_ADMIN">ID Quản Trị Facebook </label></td>
                                                        <td class="value">
                                                            <input id="FACEBOOK_ADMIN" name="FACEBOOK_ADMIN" value="{$FACEBOOK_ADMIN}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[NHẬP ID NGƯỜI DÙNG FACEBOOK MÀ BẠN MUỐN CHO LÀM ADMIN, CẦN THIẾT CHO CÁC LIKE TỪ FACEBOOK]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Đóng Dấu Ảnh </label></td>
                                                        <td class="value">
                                                            <select id="wm" name="wm" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $wm eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $wm eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[THÊM LOGO CỦA BẠN VÀO ẢNH KHI ĐĂNG HÌNH ẢNH]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Tên Ảnh Con Dấu </label></td>
                                                        <td class="value">
                                                            <input id="watermark" name="watermark" value="{$watermark}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TÊN ẢNH CON DẤU, HÃY CHẮC CHẮN BẠN ĐÃ TẢI NÓ LÊN THƯ MỤC IMAGES]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="infinity_paging">Chế Độ Trang </label></td>
                                                        <td class="value">
                                                            <select id="infinity_paging" name="infinity_paging" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $infinity_paging eq "1"}selected{/if}>Không Giới Hạn</option>
                											<option value="0" {if $infinity_paging eq "0"}selected{/if}>Bình Thường</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[KIỂU HIỂN THỊ TRÊN TRANG ĐANG HOT, BÀI MỚI VÀ BÌNH CHỌN]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="profile_max">Số Bài Đăng Hiển Thị Trong Trang Cá Nhân </label></td>
                                                        <td class="value">
                                                            <input id="profile_max" name="profile_max" value="{$profile_max}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[NẾU CHỆ ĐỘ KHÔNG GIỚI HẠN BỊ VÔ HIỆU HÓA, SỐ BÀI ĐĂNG NÀY SẼ HIỂN THỊ TRONG TRANG CÁ NHÂN]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="enable_featured">Hiển Thị Thanh Đặc Biệt </label></td>
                                                        <td class="value">
                                                            <select id="enable_featured" name="enable_featured" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $enable_featured eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $enable_featured eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[HIỂN THỊ THANH BÀI ĐĂNG ĐẶC BIỆT TRÊN TRANG CHỦ]</td>
                                                        <td><small></small></td>
                                                    </tr>

                                                    <tr class="hidden">
                                                        <td class="label"><label for="points_gag">Điểm/Bài Đăng </label></td>
                                                        <td class="value">
                                                            <input id="points_gag" name="points_gag" value="{$points_gag}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ ĐIỂM THÀNH VIÊN NHẬN ĐƯỢC VỚI MỖI BÀI ĐĂNG MỚI]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="points_view">Điểm/Lượt Xem </label></td>
                                                        <td class="value">
                                                            <input id="points_view" name="points_view" value="{$points_view}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ ĐIỂM THÀNH VIÊN NHẬN ĐƯỢC VỚI MỖI LƯỢT XEM BÀI ĐĂNG]</td>
                                                        <td><small></small></td>
                                                    </tr>

                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Chế Độ Di Động </label></td>
                                                        <td class="value">
                                                            <select id="re_mobile" name="re_mobile" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $re_mobile eq "1"}selected{/if}>Bật</option>
                                                            <option value="0" {if $re_mobile eq "0"}selected{/if}>Tắt</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[TỰ CHUYỂN SANG GIAO DIỆN DI ĐỘNG KHI NGƯỜI DÙNG TRUY CẬP BẰNG ĐIỆN THOẠI]</td>
                                                        <td><small></small></td>
                                                    </tr>

                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">URL Trang Di Động </label></td>
                                                        <td class="value">
                                                            <input id="m_url" name="m_url" value="{$m_url}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[URL TRANG DI ĐỘNG CỦA BẠN]</td>
                                                        <td><small></small></td>
                                                    </tr>

                                                </tbody>
                                                </table>
                                            </div>
                                        </fieldset>
									</div>
								</div>
    						</li>
                            
                            <li >
                                <a href="settings_meta.php" id="isoft_group_9" name="group_9" title="Cài Đặt Thẻ Meta" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Cài Đặt Thẻ Meta
                                    </span>
                                </a>
                                <div id="isoft_group_9_content" style="display:none;"></div>
                            </li>
                            
                            <li >
                                <a href="settings_static.php" id="isoft_group_11" name="group_11" title="Trang Tĩnh" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Trang Tĩnh
                                    </span>
                                </a>
                                <div id="isoft_group_11_content" style="display:none;"></div>
                            </li>
    
						</ul>
                        
						<script type="text/javascript">
                            isoftJsTabs = new varienTabs('isoft', 'main_form', 'isoft_group_1', []);
                        </script>
                        
					</div>
                    
					<div class="main-col" id="content">
						<div class="main-col-inner">
							<div id="messages">
                            {if $message ne "" OR $error ne ""}
                            	{include file="administrator/show_message.tpl"}
                            {/if}
                            </div>

                            <div class="content-header">
                               <h3 class="icon-head head-products">Cài Đặt - Cài Đặt Chung</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Lưu Thay Đổi</span></button>			
                                </p>
                            </div>
                            
                            <form action="settings_general.php" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>