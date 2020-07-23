 <div class="legal">
                <div class="copyright">
                    &copy; 2020 <a href="javascript:void(0);">B-KIPM</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <div class="tab-content">
                 <div role="tabpanel" class="tab-pane fade in active in active" id="settings">
                    <div class="demo-settings">
                        <ul class="setting-list"><li></li>
                            <li>
                               <?php if ($this->session->userdata('login') == TRUE) { 
                               ?>
                                <span><a alt="Logout" style="color: #E91E63;" href="<?php echo site_url('login/process_logout');?>"><i class="material-icons">power_settings_new</i>Logout</a></span>

                                <?php }                                else {?>

                                     <span><a alt="Login" style="color: #E91E63;" href="<?php echo site_url('login/');?>"><i class="material-icons">lock</i>Login</a></span>

                                    <?php } ?>                            </li>
                        </ul>
                         
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>