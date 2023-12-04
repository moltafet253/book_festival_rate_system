<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session('username')) {
            $menus = null;
            $user = User::where('username', session('username'))->first();
            switch ($user->type) {
                case 1:
                    //ادمین
                    $menus = [
//                        1 => [
//                            'title' => 'تعاریف اولیه',
//                            'link' => '',
//                            'childs' => [
//                                1 => [
//                                    'title' => 'برند',
//                                    'link' => '/Brands',
//                                    'path1' => 'm15.448,7.931l2.104,2.139-5.293,5.207c-.481.482-1.118.724-1.756.724s-1.282-.244-1.771-.732l-2.776-2.69,2.088-2.154,2.453,2.378,4.951-4.87Zm8.552,4.069c0,6.617-5.383,12-12,12S0,18.617,0,12,5.383,0,12,0s12,5.383,12,12Zm-3,0c0-4.962-4.037-9-9-9S3,7.038,3,12s4.037,9,9,9,9-4.038,9-9Z',
//                                ],
//                            ]
//                        ],
                        2 => [
                            'title' => 'مدیریت صاحبان اثر',
                            'link' => '/Person',
                            'path1' => 'M12,17a4,4,0,1,1,4-4A4,4,0,0,1,12,17Zm6,4a3,3,0,0,0-3-3H9a3,3,0,0,0-3,3v3H18ZM18,8a4,4,0,1,1,4-4A4,4,0,0,1,18,8ZM6,8a4,4,0,1,1,4-4A4,4,0,0,1,6,8Zm0,5A5.968,5.968,0,0,1,7.537,9H3a3,3,0,0,0-3,3v3H6.349A5.971,5.971,0,0,1,6,13Zm11.651,2H24V12a3,3,0,0,0-3-3H16.463a5.952,5.952,0,0,1,1.188,6Z',
                            'childs' => []
                        ],
                        3 => [
                            'title' => 'مدیریت آثار',
                            'link' => '/Posts',
                            'path1' => 'M23 5v13.883l-1 .117v-16c-3.895.119-7.505.762-10.002 2.316-2.496-1.554-6.102-2.197-9.998-2.316v16l-1-.117v-13.883h-1v15h9.057c1.479 0 1.641 1 2.941 1 1.304 0 1.461-1 2.942-1h9.06v-15h-1zm-12 13.645c-1.946-.772-4.137-1.269-7-1.484v-12.051c2.352.197 4.996.675 7 1.922v11.613zm9-1.484c-2.863.215-5.054.712-7 1.484v-11.613c2.004-1.247 4.648-1.725 7-1.922v12.051z',
                            'childs' => []
                        ],
                        4 => [
                            'title' => 'مدیریت ارزیابی',
                            'link' => '',
                            'path1'=>'M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z',
                            'childs' => [
                                1 => [
                                    'title' => 'گونه بندی',
                                    'link' => '/Classification',
                                    'path1' => 'M12,17a4,4,0,1,1,4-4A4,4,0,0,1,12,17Zm6,4a3,3,0,0,0-3-3H9a3,3,0,0,0-3,3v3H18ZM18,8a4,4,0,1,1,4-4A4,4,0,0,1,18,8ZM6,8a4,4,0,1,1,4-4A4,4,0,0,1,6,8Zm0,5A5.968,5.968,0,0,1,7.537,9H3a3,3,0,0,0-3,3v3H6.349A5.971,5.971,0,0,1,6,13Zm11.651,2H24V12a3,3,0,0,0-3-3H16.463a5.952,5.952,0,0,1,1.188,6Z',
                                    'childs' => []
                                ],
                                2 => [
                                    'title' => 'تاییدیه مدیر گروه',
                                    'link' => '/SummaryAssessmentFormApproval',
                                    'path1' => 'M12,17a4,4,0,1,1,4-4A4,4,0,0,1,12,17Zm6,4a3,3,0,0,0-3-3H9a3,3,0,0,0-3,3v3H18ZM18,8a4,4,0,1,1,4-4A4,4,0,0,1,18,8ZM6,8a4,4,0,1,1,4-4A4,4,0,0,1,6,8Zm0,5A5.968,5.968,0,0,1,7.537,9H3a3,3,0,0,0-3,3v3H6.349A5.971,5.971,0,0,1,6,13Zm11.651,2H24V12a3,3,0,0,0-3-3H16.463a5.952,5.952,0,0,1,1.188,6Z',
                                    'childs' => []
                                ],
                                3 => [
                                    'title' => 'اختصاص به ارزیاب اجمالی',
                                    'link' => '/SummaryAssessmentManager',
                                    'path1' => 'M12,17a4,4,0,1,1,4-4A4,4,0,0,1,12,17Zm6,4a3,3,0,0,0-3-3H9a3,3,0,0,0-3,3v3H18ZM18,8a4,4,0,1,1,4-4A4,4,0,0,1,18,8ZM6,8a4,4,0,1,1,4-4A4,4,0,0,1,6,8Zm0,5A5.968,5.968,0,0,1,7.537,9H3a3,3,0,0,0-3,3v3H6.349A5.971,5.971,0,0,1,6,13Zm11.651,2H24V12a3,3,0,0,0-3-3H16.463a5.952,5.952,0,0,1,1.188,6Z',
                                    'childs' => []
                                ],
                                4 => [
                                    'title' => 'تاییدیه فرم تفصیلی',
                                    'link' => '/DetailedAssessmentFormApproval',
                                    'path1' => 'M12,17a4,4,0,1,1,4-4A4,4,0,0,1,12,17Zm6,4a3,3,0,0,0-3-3H9a3,3,0,0,0-3,3v3H18ZM18,8a4,4,0,1,1,4-4A4,4,0,0,1,18,8ZM6,8a4,4,0,1,1,4-4A4,4,0,0,1,6,8Zm0,5A5.968,5.968,0,0,1,7.537,9H3a3,3,0,0,0-3,3v3H6.349A5.971,5.971,0,0,1,6,13Zm11.651,2H24V12a3,3,0,0,0-3-3H16.463a5.952,5.952,0,0,1,1.188,6Z',
                                    'childs' => []
                                ],
                                5  => [
                                    'title' => 'اختصاص به ارزیاب تفصیلی',
                                    'link' => '/DetailedAssessmentManager',
                                    'path1' => 'M12,17a4,4,0,1,1,4-4A4,4,0,0,1,12,17Zm6,4a3,3,0,0,0-3-3H9a3,3,0,0,0-3,3v3H18ZM18,8a4,4,0,1,1,4-4A4,4,0,0,1,18,8ZM6,8a4,4,0,1,1,4-4A4,4,0,0,1,6,8Zm0,5A5.968,5.968,0,0,1,7.537,9H3a3,3,0,0,0-3,3v3H6.349A5.971,5.971,0,0,1,6,13Zm11.651,2H24V12a3,3,0,0,0-3-3H16.463a5.952,5.952,0,0,1,1.188,6Z',
                                    'childs' => []
                                ],
                            ],
                        ],

                        5 => [
                            'title' => 'گزارشات و آمار',
                            'link' => '',
                            'path1' => 'M21 21H7.8C6.11984 21 5.27976 21 4.63803 20.673C4.07354 20.3854 3.6146 19.9265 3.32698 19.362C3 18.7202 3 17.8802 3 16.2V3M15 10V17M7 13V17M19 5V17M11 7V17',
                            'childs' => [
                                1 => [
                                    'title' => 'وضعیت ارزیابی آثار',
                                    'link' => '/AssessmentsStatus',
                                    'path1' => 'M8 3a5 5 0 100 10A5 5 0 008 3z',
                                    'childs' => []
                                ],
                                2 => [
                                    'title' => 'وضعیت تحویل اثر',
                                    'link' => '/DeliveryStatus',
                                    'path1' => 'M8 3a5 5 0 100 10A5 5 0 008 3z',
                                    'childs' => []
                                ],
                            ]
                        ],
                        7 => [
                            'title' => 'مدیریت کاربران',
                            'link' => '/UserManager',
                            'path1' => 'M5.5,7c1.93,0,3.5-1.57,3.5-3.5S7.43,0,5.5,0,2,1.57,2,3.5s1.57,3.5,3.5,3.5Zm0-5c.827,0,1.5,.673,1.5,1.5s-.673,1.5-1.5,1.5-1.5-.673-1.5-1.5,.673-1.5,1.5-1.5Zm4.5,8c-.827,0-1.5,.673-1.5,1.5,0,.328,.104,.639,.299,.899,.332,.441,.243,1.068-.199,1.4-.18,.135-.391,.201-.6,.201-.304,0-.604-.138-.8-.399-.458-.61-.701-1.336-.701-2.101,0-1.93,1.57-3.5,3.5-3.5,1.095,0,2.142,.523,2.8,1.399,.332,.442,.242,1.069-.199,1.4-.443,.332-1.068,.242-1.4-.199-.286-.382-.724-.601-1.2-.601Zm4.5-3c1.93,0,3.5-1.57,3.5-3.5s-1.57-3.5-3.5-3.5-3.5,1.57-3.5,3.5,1.57,3.5,3.5,3.5Zm0-5c.827,0,1.5,.673,1.5,1.5s-.673,1.5-1.5,1.5-1.5-.673-1.5-1.5,.673-1.5,1.5-1.5Zm8.196,17.134l-.974-.562c.166-.497,.278-1.019,.278-1.572s-.111-1.075-.278-1.572l.974-.562c.478-.276,.642-.888,.366-1.366-.277-.479-.887-.644-1.366-.366l-.973,.562c-.705-.794-1.644-1.375-2.723-1.594v-1.101c0-.552-.448-1-1-1s-1,.448-1,1v1.101c-1.079,.22-2.018,.801-2.723,1.594l-.973-.562c-.48-.277-1.09-.113-1.366,.366-.276,.479-.112,1.09,.366,1.366l.974,.562c-.166,.497-.278,1.019-.278,1.572s.111,1.075,.278,1.572l-.974,.562c-.478,.276-.642,.888-.366,1.366,.186,.321,.521,.5,.867,.5,.169,0,.341-.043,.499-.134l.973-.562c.705,.794,1.644,1.375,2.723,1.594v1.101c0,.552,.448,1,1,1s1-.448,1-1v-1.101c1.079-.22,2.018-.801,2.723-1.594l.973,.562c.158,.091,.33,.134,.499,.134,.346,0,.682-.179,.867-.5,.276-.479,.112-1.09-.366-1.366Zm-5.696,.866c-1.654,0-3-1.346-3-3s1.346-3,3-3,3,1.346,3,3-1.346,3-3,3ZM5,10c-1.654,0-3,1.346-3,3,0,.552-.448,1-1,1s-1-.448-1-1c0-2.757,2.243-5,5-5,.552,0,1,.448,1,1s-.448,1-1,1Zm5,7c0,.552-.448,1-1,1-1.654,0-3,1.346-3,3,0,.552-.448,1-1,1s-1-.448-1-1c0-2.757,2.243-5,5-5,.552,0,1,.448,1,1Z',
                            'childs' => []
                        ],
                    ];
                    break;
                case 3:
                    $menus = [
                        1 => [
                            'title' => 'تاییدیه فرم اجمالی',
                            'link' => '/Approval',
                            'path1' => 'M5.5,7c1.93,0,3.5-1.57,3.5-3.5S7.43,0,5.5,0,2,1.57,2,3.5s1.57,3.5,3.5,3.5Zm0-5c.827,0,1.5,.673,1.5,1.5s-.673,1.5-1.5,1.5-1.5-.673-1.5-1.5,.673-1.5,1.5-1.5Zm4.5,8c-.827,0-1.5,.673-1.5,1.5,0,.328,.104,.639,.299,.899,.332,.441,.243,1.068-.199,1.4-.18,.135-.391,.201-.6,.201-.304,0-.604-.138-.8-.399-.458-.61-.701-1.336-.701-2.101,0-1.93,1.57-3.5,3.5-3.5,1.095,0,2.142,.523,2.8,1.399,.332,.442,.242,1.069-.199,1.4-.443,.332-1.068,.242-1.4-.199-.286-.382-.724-.601-1.2-.601Zm4.5-3c1.93,0,3.5-1.57,3.5-3.5s-1.57-3.5-3.5-3.5-3.5,1.57-3.5,3.5,1.57,3.5,3.5,3.5Zm0-5c.827,0,1.5,.673,1.5,1.5s-.673,1.5-1.5,1.5-1.5-.673-1.5-1.5,.673-1.5,1.5-1.5Zm8.196,17.134l-.974-.562c.166-.497,.278-1.019,.278-1.572s-.111-1.075-.278-1.572l.974-.562c.478-.276,.642-.888,.366-1.366-.277-.479-.887-.644-1.366-.366l-.973,.562c-.705-.794-1.644-1.375-2.723-1.594v-1.101c0-.552-.448-1-1-1s-1,.448-1,1v1.101c-1.079,.22-2.018,.801-2.723,1.594l-.973-.562c-.48-.277-1.09-.113-1.366,.366-.276,.479-.112,1.09,.366,1.366l.974,.562c-.166,.497-.278,1.019-.278,1.572s.111,1.075,.278,1.572l-.974,.562c-.478,.276-.642,.888-.366,1.366,.186,.321,.521,.5,.867,.5,.169,0,.341-.043,.499-.134l.973-.562c.705,.794,1.644,1.375,2.723,1.594v1.101c0,.552,.448,1,1,1s1-.448,1-1v-1.101c1.079-.22,2.018-.801,2.723-1.594l.973,.562c.158,.091,.33,.134,.499,.134,.346,0,.682-.179,.867-.5,.276-.479,.112-1.09-.366-1.366Zm-5.696,.866c-1.654,0-3-1.346-3-3s1.346-3,3-3,3,1.346,3,3-1.346,3-3,3ZM5,10c-1.654,0-3,1.346-3,3,0,.552-.448,1-1,1s-1-.448-1-1c0-2.757,2.243-5,5-5,.552,0,1,.448,1,1s-.448,1-1,1Zm5,7c0,.552-.448,1-1,1-1.654,0-3,1.346-3,3,0,.552-.448,1-1,1s-1-.448-1-1c0-2.757,2.243-5,5-5,.552,0,1,.448,1,1Z',
                            'childs' => []
                        ],
                    ];
                    break;
                case 4:
                    $menus = [
                        1 => [
                            'title' => 'ارزیابی های انجام شده',
                            'link' => '/MyRates',
                            'path1' => 'M5.5,7c1.93,0,3.5-1.57,3.5-3.5S7.43,0,5.5,0,2,1.57,2,3.5s1.57,3.5,3.5,3.5Zm0-5c.827,0,1.5,.673,1.5,1.5s-.673,1.5-1.5,1.5-1.5-.673-1.5-1.5,.673-1.5,1.5-1.5Zm4.5,8c-.827,0-1.5,.673-1.5,1.5,0,.328,.104,.639,.299,.899,.332,.441,.243,1.068-.199,1.4-.18,.135-.391,.201-.6,.201-.304,0-.604-.138-.8-.399-.458-.61-.701-1.336-.701-2.101,0-1.93,1.57-3.5,3.5-3.5,1.095,0,2.142,.523,2.8,1.399,.332,.442,.242,1.069-.199,1.4-.443,.332-1.068,.242-1.4-.199-.286-.382-.724-.601-1.2-.601Zm4.5-3c1.93,0,3.5-1.57,3.5-3.5s-1.57-3.5-3.5-3.5-3.5,1.57-3.5,3.5,1.57,3.5,3.5,3.5Zm0-5c.827,0,1.5,.673,1.5,1.5s-.673,1.5-1.5,1.5-1.5-.673-1.5-1.5,.673-1.5,1.5-1.5Zm8.196,17.134l-.974-.562c.166-.497,.278-1.019,.278-1.572s-.111-1.075-.278-1.572l.974-.562c.478-.276,.642-.888,.366-1.366-.277-.479-.887-.644-1.366-.366l-.973,.562c-.705-.794-1.644-1.375-2.723-1.594v-1.101c0-.552-.448-1-1-1s-1,.448-1,1v1.101c-1.079,.22-2.018,.801-2.723,1.594l-.973-.562c-.48-.277-1.09-.113-1.366,.366-.276,.479-.112,1.09,.366,1.366l.974,.562c-.166,.497-.278,1.019-.278,1.572s.111,1.075,.278,1.572l-.974,.562c-.478,.276-.642,.888-.366,1.366,.186,.321,.521,.5,.867,.5,.169,0,.341-.043,.499-.134l.973-.562c.705,.794,1.644,1.375,2.723,1.594v1.101c0,.552,.448,1,1,1s1-.448,1-1v-1.101c1.079-.22,2.018-.801,2.723-1.594l.973,.562c.158,.091,.33,.134,.499,.134,.346,0,.682-.179,.867-.5,.276-.479,.112-1.09-.366-1.366Zm-5.696,.866c-1.654,0-3-1.346-3-3s1.346-3,3-3,3,1.346,3,3-1.346,3-3,3ZM5,10c-1.654,0-3,1.346-3,3,0,.552-.448,1-1,1s-1-.448-1-1c0-2.757,2.243-5,5-5,.552,0,1,.448,1,1s-.448,1-1,1Zm5,7c0,.552-.448,1-1,1-1.654,0-3,1.346-3,3,0,.552-.448,1-1,1s-1-.448-1-1c0-2.757,2.243-5,5-5,.552,0,1,.448,1,1Z',
                            'childs' => []
                        ],
                    ];
                    break;
                case 5:
                    $menus = [
                        1 => [
                            'title' => 'آثار در حال گونه بندی',
                            'link' => '/MyClassification',
                            'path1' => 'M5.5,7c1.93,0,3.5-1.57,3.5-3.5S7.43,0,5.5,0,2,1.57,2,3.5s1.57,3.5,3.5,3.5Zm0-5c.827,0,1.5,.673,1.5,1.5s-.673,1.5-1.5,1.5-1.5-.673-1.5-1.5,.673-1.5,1.5-1.5Zm4.5,8c-.827,0-1.5,.673-1.5,1.5,0,.328,.104,.639,.299,.899,.332,.441,.243,1.068-.199,1.4-.18,.135-.391,.201-.6,.201-.304,0-.604-.138-.8-.399-.458-.61-.701-1.336-.701-2.101,0-1.93,1.57-3.5,3.5-3.5,1.095,0,2.142,.523,2.8,1.399,.332,.442,.242,1.069-.199,1.4-.443,.332-1.068,.242-1.4-.199-.286-.382-.724-.601-1.2-.601Zm4.5-3c1.93,0,3.5-1.57,3.5-3.5s-1.57-3.5-3.5-3.5-3.5,1.57-3.5,3.5,1.57,3.5,3.5,3.5Zm0-5c.827,0,1.5,.673,1.5,1.5s-.673,1.5-1.5,1.5-1.5-.673-1.5-1.5,.673-1.5,1.5-1.5Zm8.196,17.134l-.974-.562c.166-.497,.278-1.019,.278-1.572s-.111-1.075-.278-1.572l.974-.562c.478-.276,.642-.888,.366-1.366-.277-.479-.887-.644-1.366-.366l-.973,.562c-.705-.794-1.644-1.375-2.723-1.594v-1.101c0-.552-.448-1-1-1s-1,.448-1,1v1.101c-1.079,.22-2.018,.801-2.723,1.594l-.973-.562c-.48-.277-1.09-.113-1.366,.366-.276,.479-.112,1.09,.366,1.366l.974,.562c-.166,.497-.278,1.019-.278,1.572s.111,1.075,.278,1.572l-.974,.562c-.478,.276-.642,.888-.366,1.366,.186,.321,.521,.5,.867,.5,.169,0,.341-.043,.499-.134l.973-.562c.705,.794,1.644,1.375,2.723,1.594v1.101c0,.552,.448,1,1,1s1-.448,1-1v-1.101c1.079-.22,2.018-.801,2.723-1.594l.973,.562c.158,.091,.33,.134,.499,.134,.346,0,.682-.179,.867-.5,.276-.479,.112-1.09-.366-1.366Zm-5.696,.866c-1.654,0-3-1.346-3-3s1.346-3,3-3,3,1.346,3,3-1.346,3-3,3ZM5,10c-1.654,0-3,1.346-3,3,0,.552-.448,1-1,1s-1-.448-1-1c0-2.757,2.243-5,5-5,.552,0,1,.448,1,1s-.448,1-1,1Zm5,7c0,.552-.448,1-1,1-1.654,0-3,1.346-3,3,0,.552-.448,1-1,1s-1-.448-1-1c0-2.757,2.243-5,5-5,.552,0,1,.448,1,1Z',
                            'childs' => []
                        ],
                    ];
                    break;
                case 6:
                case 7:
                    break;
            }
            $request->session()->put('menus', $menus);
            return $next($request);
        }
        return response()->redirectToRoute('login');
    }
}
