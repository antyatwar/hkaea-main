<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Competition::factory()->create([
            'title' => [
                'en' => '“Little Hearts ‧ Great Minds” 3rd Asian Youth & Children Art Competition 2022',
                'zh-hk' => '「童心‧童想」第三屆亞洲青少年兒童繪畫大賽2022',
            ],
            'slug' => 'competition-2022',
            'description' => [
                'en' => '<ul class="mb-4 list-disc list-inside">
                            <li class="text-red-800">
                                <span class="text-black">To promote art exchanges between Hong Kong youth and children and other countries</span>
                            </li>
                            <li class="text-red-800">
                                <span class="text-black">To provide an art exchange platform across Asia for teenagers and children in Asia</span>
                            </li>
                            <li class="text-red-800">
                                <span class="text-black">To make and to develop this event into a high-level drawing competition for Asian teenagers and children and it will be held annually</span>
                            </li>
                            <li class="text-red-800">
                                <span class="text-black">To allow different participating countries and regions to hold presentation and exhibition in turns. The first two exhibition were held in Hong Kong.</span>
                            </li>
                            <li class="text-red-800">
                                <span class="text-black">To gradually develop the exhibition into a touring exhibition in Asia</span>
                            </li>
                            <li class="text-red-800">
                                <span class="text-black">To provide opportunities for students to travel to various Asian regions for art and cultural study tours and exchanges so as to let students understand, experience and respect cultural differences.</span>
                            </li>
                        </ul>
                        <p class="mb-4">More than 10 countries/regions of Schools, Art Centres and Institution across Asia, including China, Hong Kong, Japan, Korea, Macau, Malaysia, Philippines, Singapore, Taiwan, Thailand and Vietnam will be invited.</p>',
                'zh-hk' => '<ul class="mb-4 list-disc list-inside">
                            <li class="text-red-800">
                                <span class="text-black">促進香港青少年及兒童與其他國家進行藝術交流</span>
                            </li>
                            <li class="text-red-800">
                                <span class="text-black">提供一個跨越亞洲的藝術交流平台予亞洲的青少年及兒童</span>
                            </li>
                            <li class="text-red-800">
                                <span class="text-black">每年舉辦大賽，持續發展成為高水平的亞洲青少年及兒童繪畫比賽</span>
                            </li>
                            <li class="text-red-800">
                                <span class="text-black">頒獎典禮及展覽將由各參與地區輪流舉辦，首兩屆已在香港舉行</span>
                            </li>
                            <li class="text-red-800">
                                <span class="text-black">優秀作品展覽將逐漸發展成亞洲區巡迴展出</span>
                            </li>
                            <li class="text-red-800">
                                <span class="text-black">大賽期間組織學生文化藝術交流團，提供機會給予參賽者到各亞洲地區進行藝術及文化遊學及交流，親身認識及體驗亞洲各地文化及藝術，了解彼此不同及尊重不同文化及差異</span>
                            </li>
                        </ul>
                        <p class="mb-4">是次比賽將邀請中國、香港、日本、韓國、澳門、馬來西亞、菲律賓、新加坡、泰國及越南等10多個國家/地區的學校、畫苑、機構學生參與。</p>',
            ],
            'process_date_1' => '2022-12-01',
            'process_date_2' => '2022-12-02',
            'process_date_3' => '2022-12-03',
            'process_date_4' => '2022-12-04',
        ]);

        \App\Models\Competition::factory()->create([
            'slug' => 'competition-2021',
        ]);

        \App\Models\Competition::factory()->create([
            'slug' => 'competition-2020',
        ]);
    }
}
