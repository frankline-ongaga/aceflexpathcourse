 <div class="row" >

                      

                      <div class="col-md-12">



                        <h2 class="text-center">Calculate the price of your order</h2>

                        

                        <div class="separator"></div>

                          <!-- Tabs Arrow -->

                        <div class="spac">

                         <form class="form-inline" role="form">

                          <div class="row">

                          <div class="col-md-6">

                          <label  for="exampleInputPassword2">Type of paper</label><br>

                          <select class="form-control" id="state">

                           <?php

                                 foreach ($typeofpaper->result_array() as $row)

                                  { ?>

                                  <option value="<?php echo $row['essaytype_name']; ?>"><?php echo $row['essaytype_name']; ?></option>

                            <?php

                                }

                            ?>

                           

                          </select>

                          </div>



                          <div class="col-md-6 ">

                          <div class="form-group" style="float: right;">

                            <label for="last-name">Pages:&nbsp;<div id="words"></div></label><br>

                            

                            <input type="number" class="form-control" id="pages" value="1" min="1" onkeyup="calculateTotal(),calculateUpper(),calculateUnder(),calculateMasters(),calculateDoctoral(),calculateWords()" onclick="calculateTotal(),calculateUpper(),calculateUnder(),calculateMasters(),calculateDoctoral(),calculateWords()">

                             

                         

                            

                          </div>    

  



                            

                          </div>

                         </div>

                         </form>

                        </div>

                          

                         

                         </div>

                        </div>

                          

                          <!-- Nav tabs -->

                          <ul class="nav nav-tabs" role="tablist">

                            <li class="active pure-menu-item current fao1"><a href="#tab1" class="pure-menu-link" onclick="calculateTotal()" role="tab" data-toggle="tab"> High School</a></li>

                            <li class="pure-menu-item fao2"><a href="#tab2" class="pure-menu-link" onclick="calculateUnder()" role="tab" data-toggle="tab"> College</a></li>

                            <li class="pure-menu-item fao3"><a href="#tab3" class="pure-menu-link" onclick="calculateUpper()" role="tab" data-toggle="tab"> University</a></li>

                            <li class="pure-menu-item fao4"><a href="#tab4" class="pure-menu-link" onclick="calculateMasters()" role="tab" data-toggle="tab"> Masters</a></li>

                            <li class="pure-menu-item fao5"><a href="#tab5" class="pure-menu-link" onclick="calculateDoctoral()" role="tab" data-toggle="tab"> Doctoral</a></li>

                          </ul>



                          <!-- Tab panes -->

                          <div class="tab-content">

                            <div class="tab-pane fade in active" id="tab1">

                             <div class="table-responsive">

                              <table class="" style="width:100%;">

                                  <colgroup>

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                  </colgroup>



                                  <tr>

                                           <?php

                                     

                                             foreach ($high->result_array() as $row)

                             

                                            { ?>

                                            <th class="kevo-small"><h3 class="prico"><sup class="sisi">$</sup><?php   echo $row['level_highschool'];  ?></h3></th> 

                                            <?php } ?>

                                    

                                  </tr>

                                  <tr>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                  </tr>



                                <tr>

                                  <td ><input class="rad"  onclick="calculateTotal()" value="14d" name="price" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateTotal()"  value="7d" name="price" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateTotal()"  value="5d" name="price" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateTotal()" checked="checked"  value="3d" name="price" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateTotal()"    value="2d" name="price" type="radio"></td>

                                  <td><input class="rad" onclick="calculateTotal()"    value="1d"  name="price" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateTotal()"     value="8h" name="price" type="radio"></td>

                                </tr>



                                <tr>

                                  <td ><span class="timely">14d</span></td>

                                  <td ><span class="timely">7d</span></td>

                                  <td ><span class="timely">5d</span></td>

                                  <td ><span class="timely">3d</span></td>

                                  <td ><span class="timely">2d</span></td>

                                  <td ><span class="timely">1d</span><br></td>

                                  <td ><span class="timely">8h</span></td>

                                </tr>

                                <tr style="padding-bottom: 50px;">

                                  <td height="50" ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                </tr>

                               

                                 

                             

                             

                            </table>

                            </div>

                                <div class="tot">

                                  <div id="totalPrice"></div> 

                                  <div class="orderbutton">

                                 

                                  <a href="<?php echo base_url('Professionalwriting/order_now')?>" class="btn btn-white">Order Now</a>

                                  </div>

                                      

                               </div>

                            









                                  

                

                            

                        

                            </div>

                            <div class="tab-pane fade" id="tab2">

                            <div class="table-responsive">

                              <table class="" style="width:100%;">

                                  <colgroup>

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                  </colgroup>



                                  <tr>

                                           <?php

                                     

                                             foreach ($undergrad_lower->result_array() as $row)

                             

                                            { ?>

                                            <th class="kevo-small"><h3 class="prico"><sup class="sisi">$</sup><?php   echo $row['level_undergradlower'];  ?></h3></th> 

                                            <?php } ?>

                                    

                                  </tr>

                                  <tr>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                  </tr>



                                <tr>

                                  <td ><input class="rad"  onclick="calculateUnder()" value="14d" name="see" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateUnder()"  value="7d" name="see" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateUnder()"  value="5d" name="see" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateUnder()" checked="checked"  value="3d" name="see" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateUnder()"    value="2d" name="see" type="radio"></td>

                                  <td><input class="rad" onclick="calculateUnder()"    value="1d"  name="see" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateUnder()"     value="8h" name="see" type="radio"></td>

                                </tr>



                                <tr>

                                  <td ><span class="timely">14d</span></td>

                                  <td ><span class="timely">7d</span></td>

                                  <td ><span class="timely">5d</span></td>

                                  <td ><span class="timely">3d</span></td>

                                  <td ><span class="timely">2d</span></td>

                                  <td ><span class="timely">1d</span><br></td>

                                  <td ><span class="timely">8h</span></td>

                                </tr>

                                <tr style="padding-bottom: 50px;">

                                  <td height="50" ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                </tr>

                               

                                 

                             

                             

                              </table>

                            </div>

                                <div class="tot">

                                  <div id="totalundergrad"></div> 

                                  <div class="orderbutton">

                                 

                                  <a href="<?php echo base_url('Professionalwriting/order_now')?>" class="btn btn-white">Order Now</a>

                                  </div>

                                      

                               </div>

                            

                            </div>

                            <div class="tab-pane fade" id="tab3">

                            <div class="table-responsive">

                              <table class="" style="width:100%;">

                                  <colgroup>

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                  </colgroup>



                                  <tr>

                                           <?php

                                     

                                             foreach ($undergrad_higher->result_array() as $row)

                             

                                            { ?>

                                            <th class="kevo-small"><h3 class="prico"><sup class="sisi">$</sup><?php   echo $row['level_undergradupper'];  ?></h3></th> 

                                            <?php } ?>

                                    

                                  </tr>

                                  <tr>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                  </tr>



                                <tr>

                                  <td ><input class="rad"  onclick="calculateUpper()" value="14d" name="upper" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateUpper()"  value="7d" name="upper" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateUpper()"  value="5d" name="upper" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateUpper()" checked="checked"  value="3d" name="upper" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateUpper()"    value="2d" name="upper" type="radio"></td>

                                  <td><input class="rad" onclick="calculateUpper()"    value="1d"  name="upper" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateUpper()"     value="8h" name="upper" type="radio"></td>

                                </tr>



                                <tr>

                                  <td ><span class="timely">14d</span></td>

                                  <td ><span class="timely">7d</span></td>

                                  <td ><span class="timely">5d</span></td>

                                  <td ><span class="timely">3d</span></td>

                                  <td ><span class="timely">2d</span></td>

                                  <td ><span class="timely">1d</span><br></td>

                                  <td ><span class="timely">8h</span></td>

                                </tr>

                                <tr style="padding-bottom: 50px;">

                                  <td height="50" ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                </tr>

                               

                                 

                             

                             

                              </table>

                             </div>

                                <div class="tot">

                                  <div id="upper"></div> 

                                  <div class="orderbutton">

                                 

                                  <a href="<?php echo base_url('Professionalwriting/order_now')?>" class="btn btn-white">Order Now</a>

                                  </div>

                                      

                               </div>

                            </div>

                            <div class="tab-pane fade" id="tab4">

                            <div class="table-responsive">

                             <table class="" style="width:100%;">

                                  <colgroup>

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                  </colgroup>



                                  <tr>

                                           <?php

                                     

                                             foreach ($masters->result_array() as $row)

                             

                                            { ?>

                                            <th class="kevo-small"><h3 class="prico"><sup class="sisi">$</sup><?php   echo $row['level_masters'];  ?></h3></th> 

                                            <?php } ?>

                                    

                                  </tr>

                                  <tr>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                  </tr>



                                <tr>

                                  <td ><input class="rad"  onclick="calculateMasters()" value="14d" name="masters" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateMasters()"  value="7d" name="masters" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateMasters()"  value="5d" name="masters" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateMasters()" checked="checked"  value="3d" name="masters" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateMasters()"    value="2d" name="masters" type="radio"></td>

                                  <td><input class="rad" onclick="calculateMasters()"    value="1d"  name="masters" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateMasters()"     value="8h" name="masters" type="radio"></td>

                                </tr>



                                <tr>

                                  <td ><span class="timely">14d</span></td>

                                  <td ><span class="timely">7d</span></td>

                                  <td ><span class="timely">5d</span></td>

                                  <td ><span class="timely">3d</span></td>

                                  <td ><span class="timely">2d</span></td>

                                  <td ><span class="timely">1d</span><br></td>

                                  <td ><span class="timely">8h</span></td>

                                </tr>

                                <tr style="padding-bottom: 50px;">

                                  <td height="50" ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                </tr>

                               

                                 

                             

                             

                              </table>

                            </div>

                                <div class="tot">

                                  <div id="mastersid"></div> 

                                  <div class="orderbutton">

                                 

                                  <a href="<?php echo base_url('Professionalwriting/order_now')?>" class="btn btn-white">Order Now</a>

                                  </div>

                                      

                               </div>

                            </div>

                            

                              <div class="tab-pane fade" id="tab5">

                             <table class="" style="width:100%;">

                                  <colgroup>

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                    <col class="kevo-small">

                                  </colgroup>



                                  <tr>

                                           <?php

                                     

                                             foreach ($doctoral->result_array() as $row)

                             

                                            { ?>

                                            <th class="kevo-small"><h3 class="prico"><sup class="sisi">$</sup><?php   echo $row['level_doctoral'];  ?></h3></th> 

                                            <?php } ?>

                                    

                                  </tr>

                                  <tr>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                      <td><span class="pagey">page</span></td>

                                  </tr>



                                <tr>

                                  <td ><input class="rad"  onclick="calculateDoctoral()" value="14d" name="doctoral" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateDoctoral()"  value="7d" name="doctoral" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateDoctoral()"  value="5d" name="doctoral" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateDoctoral()" checked="checked"  value="3d" name="doctoral" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateDoctoral()"    value="2d" name="doctoral" type="radio"></td>

                                  <td><input class="rad" onclick="calculateDoctoral()"    value="1d"  name="doctoral" type="radio"></td>

                                  <td ><input class="rad" onclick="calculateDoctoral()"     value="8h" name="doctoral" type="radio"></td>

                                </tr>



                                <tr>

                                  <td ><span class="timely">14d</span></td>

                                  <td ><span class="timely">7d</span></td>

                                  <td ><span class="timely">5d</span></td>

                                  <td ><span class="timely">3d</span></td>

                                  <td ><span class="timely">2d</span></td>

                                  <td ><span class="timely">1d</span><br></td>

                                  <td ><span class="timely">8h</span></td>

                                </tr>

                                <tr style="padding-bottom: 50px;">

                                  <td height="50" ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                  <td ><span class="deadline">deadline</span></td>

                                </tr>

                               

                                 

                             

                             

                              </table>

                                <div class="tot">

                                  <div id="doctoralid"></div> 

                                  <div class="orderbutton">

                                 

                                  <a href="<?php echo base_url('Professionalwriting/order_now')?>" class="btn btn-white">Order Now</a>

                                  </div>

                                      

                               </div>

                            </div>



                          </div>