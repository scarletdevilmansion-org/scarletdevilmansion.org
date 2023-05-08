        <div class="header-v1">
            <div class="header-v2">
                <div class="card">
                    <a href="">test</a>
                    <span>Test</span>
                </div>
            </div>
            <div class="header-v3">
                <div class="menu-content">
                    <div class="menu-title">
                        <span>En Son Konular</span>
                        <table>
                            <tr>
                                <?php

                                $posts = $db->query('SELECT * FROM user_topic where type="topic" ORDER BY created_at DESC'); 
                                
                                ?>
                                <?php foreach($posts as $post): ?>
                                    <td>
                                        <a href="<?=$post['topic_url']; ?>">
                                            <div>
                                                <?=$post['topic_name']; ?>
                                            </div>
                                        </a>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="menu-content">
                    <div class="menu-title">
                        <span>En Son Etkinlikler</span>
                        <table>
                            <tr>
                                <?php

                                $posts = $db->query('SELECT * FROM user_topic where type="event" ORDER BY created_at DESC'); 
                                
                                ?>
                                <?php foreach($posts as $post): ?>
                                    <td>
                                        <a href="<?=$post['topic_url']; ?>">
                                            <div>
                                                <?=$post['topic_name']; ?>
                                            </div>
                                        </a>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>