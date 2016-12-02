<?php

namespace AppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    public function getName()
    {
        return 'app_extension';
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('monto', array($this, 'montoFilter')),
        );
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('lipsum', array($this, 'lipsumFunction')),
        );
    }

    public function montoFilter($valor, $moneda)
    {
        if (!is_numeric($valor)) {
            throw new \InvalidArgumentException(
                sprintf('El valor "%s" debe ser un numerico', $valor)
            );
        }

        if(!in_array($moneda, ['Gs', 'U$S'])){
            throw new \InvalidArgumentException(
                sprintf('La moneda "%s" debe ser [Gs|U$S]', $moneda)
            );
        }

        return number_format($valor, 0, ',', '.') . ' ' . $moneda;
    }

    public function lipsumFunction($length)
    {
        $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel nisi facilisis, interdum magna eget, pellentesque massa. Integer nibh sem, convallis sed vestibulum ac, condimentum vel est. Suspendisse dictum diam at posuere convallis. Quisque feugiat ut nisi nec consequat. Vestibulum sollicitudin urna in leo fermentum, vulputate posuere ipsum porttitor. Aliquam erat volutpat. Etiam imperdiet, mauris id feugiat tincidunt, risus purus luctus erat, non pulvinar ante est in magna. Sed gravida ipsum id felis iaculis, quis ultrices ex ultrices.
Sed ultricies vel nunc non feugiat. Proin sed purus id arcu facilisis pulvinar ac laoreet metus. Praesent vel nisi sit amet ante dapibus posuere. Vestibulum cursus massa non feugiat molestie. Aliquam ante quam, ultricies eu ornare ac, varius tempus turpis. In sodales magna nec metus dignissim hendrerit. Curabitur consequat, ipsum vel mattis maximus, ante est elementum massa, sed sodales ipsum justo ut dolor. Proin eu ex sit amet erat interdum porttitor. Pellentesque varius leo quis leo ultrices aliquam. In sed metus risus. Praesent nunc ex, finibus et sagittis quis, feugiat vitae tellus. Nunc posuere sagittis rutrum. Ut semper iaculis iaculis. Nunc dictum sagittis dui a sagittis.
Phasellus eu tortor a risus porttitor ornare. Mauris luctus vulputate posuere. Aliquam maximus tincidunt urna, vitae accumsan erat suscipit et. Phasellus dapibus dictum leo ac tempor. Curabitur sed mollis velit, nec rhoncus ligula. Praesent dapibus, lorem nec tempus fringilla, eros nulla iaculis mi, non lobortis sapien ligula sed odio. Ut gravida ultricies nibh, eu ornare tellus porttitor id. Nunc molestie tortor eget commodo volutpat. Suspendisse vitae dolor tortor.
Maecenas in ante hendrerit, volutpat elit ut, suscipit nisl. Cras pulvinar imperdiet erat, vitae molestie orci. Duis commodo finibus condimentum. Suspendisse potenti. Aliquam eu justo accumsan, finibus nunc nec, imperdiet augue. In vulputate at justo vel pulvinar. Etiam dapibus, libero a ultricies tempus, ante urna faucibus est, in laoreet diam elit hendrerit felis. Sed suscipit, augue fermentum congue vestibulum, purus felis porttitor nulla, vitae rhoncus mauris odio sit amet augue. Duis facilisis ante in felis euismod, sodales scelerisque diam scelerisque.
Mauris convallis risus leo. Nullam id ante augue. In vitae leo a neque vehicula rutrum quis vel libero. Nunc posuere convallis sapien, id sagittis nisl malesuada nec. Vivamus ut arcu non nulla tempor lacinia quis sed orci. Etiam nulla mi, tempor pellentesque neque et, ultricies suscipit lectus. Donec quis libero diam. In mattis nibh vel lorem ultricies, sit amet dignissim arcu rutrum.
Proin in pharetra orci. Vestibulum eget aliquam odio, vitae maximus mauris. Suspendisse vitae arcu eget ante gravida molestie. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse lacinia nibh vel sollicitudin feugiat. Pellentesque maximus lacinia massa, id malesuada dui imperdiet quis. Praesent ultrices vitae nunc eu blandit. Morbi pulvinar euismod tincidunt. Nullam auctor dapibus lobortis. Pellentesque pharetra egestas tortor, sed semper ante pharetra viverra.
Aenean tortor lacus, ultricies vitae justo ac, egestas sagittis lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus porttitor sem eget libero aliquam elementum ac ut neque. Donec ultricies, nisi quis mollis volutpat, magna eros rhoncus eros, eu consectetur lorem libero vitae augue. Nunc viverra eget mauris ut cursus. Mauris faucibus sem eget semper viverra. Pellentesque venenatis leo blandit semper gravida. Proin eget arcu id turpis malesuada blandit vulputate in sapien. Donec luctus mollis nisi, vel maximus ex sagittis ac. Sed quis accumsan elit, ut vehicula eros.
Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis vitae urna sit amet magna cursus feugiat ut in eros. Sed id arcu tortor. Sed tempus at orci accumsan rhoncus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse potenti. Morbi porta pulvinar purus vel tristique. Donec mollis pellentesque tortor, quis ornare dui rhoncus a.
Phasellus rhoncus convallis libero ut dignissim. Mauris nec molestie eros, nec blandit turpis. Sed in vehicula urna. Nulla placerat pretium lacus, id efficitur leo interdum pharetra. Ut eu leo finibus, interdum tellus vitae, imperdiet ipsum. Cras tellus urna, posuere nec lorem cursus, vulputate tincidunt tellus. Aenean congue, lacus a interdum viverra, ligula lectus fringilla ipsum, in fermentum nulla mauris vel sapien. In porttitor rhoncus tempor. Sed nulla orci, euismod ac porttitor et, tincidunt vitae sapien. Sed vel lobortis mi. Fusce pretium auctor tortor quis tempor.
Morbi vehicula purus eget imperdiet vestibulum. Nullam rhoncus dictum vulputate. Vivamus sit amet augue condimentum quam pharetra rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porta malesuada nulla, id convallis nunc ornare id. Sed rutrum, erat sit amet tincidunt dignissim, lectus risus rutrum mi, vitae rutrum neque mauris quis nisi. Aenean sit amet sem accumsan, efficitur est mattis, faucibus velit.
Vestibulum efficitur vulputate pellentesque. Praesent pharetra, dui ornare porta fermentum, nisi ex elementum dolor, at molestie risus neque euismod felis. Morbi eu purus ac nulla eleifend maximus. Curabitur at dui massa. Nulla et ipsum felis. Sed ullamcorper augue sed mauris blandit pharetra. Praesent volutpat, massa ut semper tincidunt, dolor tortor porta ligula, suscipit bibendum tellus justo quis ex. Sed at ex a libero volutpat dapibus nec et turpis. Cras nec viverra nibh.
Suspendisse vestibulum viverra purus. Nulla aliquet molestie justo, a fermentum enim varius placerat. Nunc tincidunt vel turpis a tristique. Nam facilisis, nisi consectetur fermentum auctor, lectus massa imperdiet sem, et placerat augue leo sit amet leo. Curabitur scelerisque blandit volutpat. Maecenas pharetra, ipsum id dapibus cursus, magna leo sodales augue, eu fringilla arcu eros non massa. Pellentesque id erat in metus feugiat mollis. Cras in elit sit amet diam faucibus pulvinar non at mi. Proin aliquet risus augue, sit amet congue nulla malesuada sit amet. Curabitur arcu est, dignissim pharetra ipsum id, gravida condimentum ex. Curabitur at luctus velit.
Morbi vitae mollis purus. Sed commodo felis mi, in fermentum ligula laoreet nec. Nullam vitae dapibus enim. Curabitur a aliquet ipsum, a lacinia elit. Suspendisse id maximus augue. Nunc sapien arcu, cursus eu tempus sit amet, pulvinar eget erat. Proin malesuada enim a lorem laoreet finibus. Duis tincidunt cursus leo vel lobortis. Donec efficitur blandit elit sed lobortis. Nulla sed nisl in lectus elementum volutpat non sit amet velit. Praesent auctor rhoncus eros.
Maecenas quis sem non mi porttitor fermentum. Nulla condimentum est vitae arcu facilisis congue. Donec ut mi vel magna ultricies scelerisque. In blandit odio nec risus rutrum, quis dictum lorem aliquam. Fusce at nulla interdum, imperdiet lacus ac, vehicula neque. Vestibulum finibus, massa nec dictum convallis, sem est ornare tortor, eu posuere justo eros et nisl. Nulla ornare semper semper. Aliquam ultricies at erat dapibus porttitor. In eu porttitor ligula. Suspendisse fermentum tempus est, eget maximus ligula gravida id. Nam dignissim, nunc vel auctor placerat, ligula mauris luctus lacus, id tincidunt neque augue sed sapien. Vestibulum eget sagittis ligula, sed egestas nisi. Suspendisse congue diam vel sapien varius tempus. Vivamus sodales ante a diam ullamcorper, in rhoncus justo vulputate. Sed neque sem, finibus eu arcu non, bibendum consequat lectus.
Integer at aliquam massa. Quisque placerat orci eget nulla condimentum, non ultricies tortor sodales. Quisque finibus ullamcorper lacinia. Phasellus egestas commodo mauris id ultrices. Sed feugiat odio et feugiat sodales. Pellentesque consequat est eget urna blandit pharetra convallis in risus. Integer sed enim luctus, fringilla velit vel, pulvinar eros. Phasellus consectetur mauris sed ultricies finibus. In ac arcu eu lorem sagittis molestie et sed nibh. Sed efficitur metus ac massa scelerisque, a sollicitudin ipsum molestie. Donec id ipsum odio. Proin consequat lorem arcu, quis imperdiet ante finibus eu.
Cras id aliquam mauris, non volutpat tellus. Vivamus in ante lorem. Cras ut pharetra augue. Pellentesque lacinia dolor vitae risus hendrerit, ac fermentum nunc tempor. Sed orci leo, pharetra gravida nulla non, facilisis luctus nulla. Curabitur id hendrerit quam. Vestibulum rhoncus, enim in pretium interdum, risus urna molestie augue, at facilisis lorem justo ac erat. Cras ut mauris sit amet turpis vehicula congue. Sed efficitur porta luctus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla feugiat vehicula turpis, ut malesuada leo fermentum a.
Mauris in magna a neque iaculis vestibulum id eu ipsum. Suspendisse in malesuada est. Nullam accumsan consequat eleifend. Nunc quam tortor, hendrerit vel felis placerat, pretium ornare ipsum. Fusce faucibus non arcu vel ultrices. Nullam ut lacus imperdiet, porttitor mi non, fermentum mauris. Nullam pulvinar nibh nec mollis euismod.
Nunc rhoncus mi arcu, id sagittis velit sodales eget. In iaculis mauris id venenatis aliquet. Donec non leo nec odio pulvinar luctus at eu lectus. Proin ullamcorper tortor sed justo egestas fringilla. Nunc nec diam leo. Suspendisse nibh ante, convallis non molestie a, congue a orci. Fusce at lacus ut nisl tempor vulputate id ut nulla. Duis elementum pellentesque lorem, eget sollicitudin dolor vulputate sit amet. Phasellus eleifend imperdiet dui, ac aliquet diam suscipit ut. Morbi cursus sapien id feugiat iaculis. Aenean accumsan est ut massa interdum euismod. Proin et tempor lectus. Vestibulum vitae pretium felis, nec iaculis risus. Nullam sollicitudin est at placerat sollicitudin. Integer dignissim leo eget mauris consectetur, quis auctor massa fermentum.
Vivamus et sodales libero, vel porttitor purus. Donec eleifend ante nulla, nec molestie metus venenatis ac. Nunc hendrerit libero scelerisque, rhoncus ante nec, convallis turpis. Quisque fermentum lacinia elit eget congue. Duis feugiat ipsum at turpis condimentum rhoncus. Suspendisse interdum ligula sit amet libero porttitor sagittis. Nunc nec nisi et mi accumsan tincidunt. Donec ornare vehicula ornare. Etiam risus lectus, congue a risus tempus, fermentum ornare tellus. Nulla sem nibh, pulvinar non tristique sed, dictum ac orci. In dignissim, lacus in ultricies ornare, sem nibh porttitor neque, viverra elementum tortor dui id lorem. Nulla facilisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus at eros a turpis gravida fringilla eu vel lectus. Ut tincidunt mi a dolor bibendum, ac lacinia ligula gravida.
Nulla non faucibus velit, iaculis feugiat diam. Maecenas est tortor, sodales vitae felis vitae, ullamcorper congue lacus. Proin semper venenatis risus. Morbi auctor mauris vel dapibus imperdiet. Integer convallis egestas nibh a suscipit. Phasellus gravida fermentum ligula, bibendum mattis felis faucibus ac. Nullam viverra nec neque sed hendrerit. Etiam accumsan arcu quam, ut pretium nulla maximus non. Nulla dignissim suscipit tempus. Sed et lacus quis elit volutpat interdum sit amet vitae orci.';
        $words = explode(' ', $text);
        return implode(' ', array_slice($words, 0, $length)).'...';
    }
}