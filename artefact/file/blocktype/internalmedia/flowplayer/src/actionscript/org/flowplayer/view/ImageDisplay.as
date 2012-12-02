/*    
 *    Copyright (c) 2008-2011 Flowplayer Oy *
 *    This file is part of Flowplayer.
 *
 *    Flowplayer is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    Flowplayer is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with Flowplayer.  If not, see <http://www.gnu.org/licenses/>.
 */

package org.flowplayer.view {
	import org.flowplayer.model.Clip;
	import org.flowplayer.view.MediaDisplay;
	
	import flash.display.DisplayObject;	

	/**
	 * @author api
	 */
	internal class ImageDisplay extends AbstractSprite implements MediaDisplay {

		private var image:DisplayObject;
		private var _clip:Clip;

		public function ImageDisplay(clip:Clip) {
			_clip = clip;
		}

		public function init(clip:Clip):void {
			log.debug("received image to display");
			if (image)
				removeChild(image);
			if (! clip.getContent()) return;
			image = clip.getContent();
			addChild(image);
		}
		
		public function hasContent():Boolean {
			return image != null;
		}
		
		override public function toString():String {
			return "[ImageDisplay] for clip " + _clip;			
		}
    }
}
